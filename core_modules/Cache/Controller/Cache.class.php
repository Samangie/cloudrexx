<?php

/**
 * Cloudrexx
 *
 * @link      http://www.cloudrexx.com
 * @copyright Cloudrexx AG 2007-2015
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Cloudrexx" is a registered trademark of Cloudrexx AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

/**
 * Cache
 * @copyright   CLOUDREXX CMS - CLOUDREXX AG
 * @author      Cloudrexx Development Team <info@cloudrexx.com>
 * @version     3.1.2
 * @package     cloudrexx
 * @subpackage  coremodule_cache
 */
namespace Cx\Core_Modules\Cache\Controller;
/**
 * Cache
 * @copyright   CLOUDREXX CMS - CLOUDREXX AG
 * @author      Cloudrexx Development Team <info@cloudrexx.com>
 * @version     3.1.2
 * @package     cloudrexx
 * @subpackage  coremodule_cache
 */
class Cache extends \Cx\Core_Modules\Cache\Controller\CacheLib
{
    var $boolIsEnabled = false; //Caching enabled?
    var $intCachingTime; //Expiration time for cached file

    var $strCachePath; //Path to cache-directory
    var $strCacheFilename; //Name of the current cache-file

    var $arrPageContent = array(); //array containing $_SERVER['REQUEST_URI'] and $_REQUEST

    var $arrCacheablePages = array(); //array of all pages with activated caching
    
    /**
     * @var string $apiUrlString
     * This cannot be set to it's value until DB is initialized (since Url::from* needs DB)
     */
    protected $apiUrlString = '';


    /**
     * Constructor
     *
     * @global array $_CONFIG
     */
    public function __construct()
    {
        parent::__construct();
        $this->initContrexxCaching();
    }

    protected function initContrexxCaching()
    {
        global $_CONFIG;

        // in case the request's origin is from a mobile devie
        // and this is the first request (the InitCMS object wasn't yet
        // able to determine of the mobile device wishes to be served
        // with the system's mobile view), we shall cache the request separately
        $isMobile = (
            \InitCMS::_is_mobile_phone() &&
            !\InitCMS::_is_tablet() &&
            !isset($_REQUEST['smallscreen'])
        );

        if ($_CONFIG['cacheEnabled'] == 'off') {
            $this->boolIsEnabled = false;
            return;
        }

        if (isset($_REQUEST['caching']) && $_REQUEST['caching'] == '0') {
            $this->boolIsEnabled = false;
            return;
        }

        if (isset($_GET['templateEditor']) && $_GET['templateEditor'] == 1) {
            $this->boolIsEnabled = false;
            return;
        }

        if (\Cx\Core\Core\Controller\Cx::instanciate()->getMode() == \Cx\Core\Core\Controller\Cx::MODE_MINIMAL) {
            $this->boolIsEnabled = false;
            return;
        }

        $this->boolIsEnabled = true;

        $this->intCachingTime = intval($_CONFIG['cacheExpiration']);

        // Use data of $_GET and $_POST to uniquely identify a request.
        // Important: You must not use $_REQUEST instead. $_REQUEST also contains
        //            the data of $_COOKIE. Whereas the cookie information might
        //            change in each request, which might break the caching-
        //            system.
        $request = array_merge_recursive($_GET, $_POST);
        ksort($request);
        $currentUrl = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' .
            $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->arrPageContent = array(
            'url' => $currentUrl,
            'request' => $request,
            'accept_language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            'isMobile' => $isMobile,
        );
        $this->strCacheFilename = md5(serialize($this->arrPageContent));
    }


    /**
     * Start caching functions. If this page is already cached, load it, otherwise create new file
     */
    public function startContrexxCaching()
    {
        if (!$this->boolIsEnabled) {
            return null;
        }
        $files = glob($this->strCachePath . $this->strCacheFilename . "*");

        $matches = array();
        foreach ($files as $file) {
            // sort out false-positives (header and ESI cache files)
            if (!preg_match('/([0-9a-f]{32})_([0-9]+)?$/', $file, $matches)) {
                continue;
            }
            if (filemtime($file) > (time() - $this->intCachingTime)) {
                // load headers
                $headerFile = $this->strCachePath . $matches[1] . '_h' . $matches[2];
                if (file_exists($headerFile)) {
                    $headers = unserialize(file_get_contents($headerFile));
                    if (is_array($headers)) {
                        foreach ($headers as $name=>$value) {
                            if (is_numeric($name)) {
                                // This allows headers without a ':'
                                header($value);
                                continue;
                            }
                            header($name . ': ' . $value);
                        }
                    }
                }

                //file was cached before, load it
                $endcode = file_get_contents($file);

                echo $this->internalEsiParsing($endcode, true);
                exit;
            } else {
                $File = new \Cx\Lib\FileSystem\File($file);
                $File->delete();
            }
        }
    }


    /**
     * End caching functions. Check for a sessionId: if not set, write pagecontent to a file.
     */
    public function endContrexxCaching($page, $endcode)
    {
        // TODO: $dynVars needs to be built dynamically
        $this->dynVars = array(
            'GEO' => array(
                'country_code' => \Cx\Core\Routing\Url::fromApi('Data', array('Plain', 'GeoIp', 'getCountryCode'))->toString(),
            )
        );
        
        // back-replace ESI variables that are url encoded
        foreach ($this->dynVars as $groupName=>$vars) {
            foreach ($vars as $varName=>$url) {
                $esiPlaceholder = '$(' . $groupName . '{\'' . $varName . '\'})';
                $endcode = str_replace(urlencode($esiPlaceholder), $esiPlaceholder, $endcode);
            }
        }

        $cx = \Cx\Core\Core\Controller\Cx::instanciate();
        
        $exceptions = array(
            // never cache errors
            'Error', 

            // never cache when caching is disabled
            function($cx, $page) {
                return !$this->boolIsEnabled;
            },

            // all the following exceptions are TEMPORARY and only necessary
            // due to non-proper implementation of caching mechanisms
            
            // do not cache if a user is logged in (since we can't handle user based ESI caches yet)
            function ($cx, $page) {
                return session_id() != '' &&
                    \FWUser::getFWUserObject()->objUser->login();
            },

            // do not cache if uploader is in use (since its ID will get cached otherwise)
            function ($cx, $page) {
                return $cx->getComponent('Uploader')->isActive();
            },

            // here come the modules:
            'Access',
            'Blog',
            'Calendar' => array(
                'my_events',
                'add',
                'edit',
                'register',
                'sign',
                'success',
            ),
            'Checkout',
            'Crm',
            'Data',
            'Directory',
            'DocSys',
            'Downloads',
            'Ecard',
            'Egov',
            'Feed',
            'FileSharing',
            'Forum',
            'Gallery',
            'GuestBook',
            'Jobs',
            'Knowledge',
            'Livecam',
            'Market',
            'Media',
            'Media1',
            'Media2',
            'Media3',
            'Media4',
            'MediaDir' => array(
                'latest',
                'popular',
                'myentries',
                'adduser',
                'confirm_in_progress',
                'add',
                'edit',
            ),
            'MemberDir',
            'News' => array(
                'submit',
            ),
            'Newsletter' => array(
                function($page) {
                    return $page->getCmd() == 'profile' && $_SERVER['REQUEST_METHOD'] != 'POST';
                },
            ),
            'Podcast',
            'Shop',
            'Survey',
            'U2u',
            'Voting',
        );

        if ($this->isException($page, $cx)) {
            return $this->internalEsiParsing($endcode);
        }

        // write header cache file
        $resolver = \Env::get('Resolver');
        $headers = $resolver->getHeaders();
        $this->writeCacheFileForRequest($page, $headers, $endcode);
        return $this->internalEsiParsing($endcode);
    }

    /**
     * Writes the cache file for the current request
     * @param \Cx\Core\ContentManager\Model\Entity\Page $page Current page (might be null for redirects before postResolve)
     * @param array $headers List of headers set for the current response
     * @param string $endcode Current response
     */
    public function writeCacheFileForRequest($page, $headers, $endcode) {
        $pageId = '';
        if ($page) {
            $pageId = $page->getId();
        }
        if (count($headers)) {
            $handleFile = $this->strCachePath . $this->strCacheFilename . '_h' . $pageId;
            $File = new \Cx\Lib\FileSystem\File($handleFile);
            $File->write(serialize($headers));
        }
        // write page cache file
        $handleFile = $this->strCachePath . $this->strCacheFilename . '_' . $pageId;
        $File = new \Cx\Lib\FileSystem\File($handleFile);
        $File->write($endcode);
    }

    /**
     * Parses ESI directives internally if configured to do so
     * @param string $htmlCode HTML code to replace ESI directives in
     * @return string Parsed HTML code
     */
    public function internalEsiParsing($htmlCode, $cxNotYetInitialized = false) {
        
        if (!is_a($this->getSsiProxy(), '\\Cx\\Core_Modules\\Cache\\Model\\Entity\\ReverseProxyCloudrexx')) {
            return $htmlCode;
        }
        
        // Replace include tags
        $settings = $this->getSettings();
        // apply ESI dynamic variables
        foreach ($this->dynVars as $groupName=>$vars) {
            foreach ($vars as $varName=>$url) {
                $esiPlaceholder = '$(' . $groupName . '{\'' . $varName . '\'})';
                if (strpos($htmlCode, $esiPlaceholder) === false) {
                    continue;
                }
                try {
                    $varValue = $this->getApiResponseForUrl($url);
                } catch (\Exception $e) {
                    $varValue = '';
                }
                $htmlCode = str_replace($esiPlaceholder, $varValue, $htmlCode);
            }
        }
        $replaceEsiFn = function($matches) use (&$cxNotYetInitialized, $settings) {
            // return cached content if available
            $cacheFile = $this->getCacheFileNameFromUrl($matches[1]);
            if ($settings['internalSsiCache'] == 'on' && file_exists($this->strCachePath . $cacheFile)) {
                if (filemtime($this->strCachePath . $cacheFile) > (time() - $this->intCachingTime)) {
                    return file_get_contents($this->strCachePath . $cacheFile);
                } else {
                    $file = new \Cx\Lib\FileSystem\File($this->strCachePath . $cacheFile);
                    $file->delete();
                }
            }

            if ($cxNotYetInitialized) {
                \Cx\Core\Core\Controller\Cx::instanciate(
                    \Cx\Core\Core\Controller\Cx::MODE_MINIMAL,
                    true,
                    null,
                    true
                );
                $cxNotYetInitialized = false;
            }

            // TODO: Somehow FRONTEND_LANG_ID is sometimes undefined here...
            if (!defined('FRONTEND_LANG_ID')) {
                define('FRONTEND_LANG_ID', 1);
            }

            try {
                $content = $this->getApiResponseForUrl($matches[1]);

                if ($settings['internalSsiCache'] == 'on') {
                    $file = new \Cx\Lib\FileSystem\File($this->strCachePath . $cacheFile);
                    $file->write($content);
                }
            } catch (\Exception $e) {
                $content = '';
            }

            return $content;
        };

        do {
            // Random include tags
            $htmlCode = preg_replace_callback(
                '#<!-- ESI_RANDOM_START -->[\s\S]*<esi:assign name="content_list">\s*\[([^\]]+)\]\s*</esi:assign>[\s\S]*<!-- ESI_RANDOM_END -->#',
                function($matches) {
                    $uris = explode('\',\'', substr($matches[1], 1, -1));
                    $randomNumber = rand(0, count($uris) - 1);
                    $uri = $uris[$randomNumber];
                    
                    // this needs to match the format below!
                    return '<esi:include src="' . $uri . '" onerror="continue"/>';
                },
                $htmlCode
            );

            $htmlCode = preg_replace_callback(
                '#<esi:include src="([^"]+)" onerror="continue"/>#',
                $replaceEsiFn,
                $htmlCode,
                -1,
                $count
            );
            // repeat replacement to recursively parse ESI-tags 
        } while ($count);

        return $htmlCode;
    }

    /**
     * This parses the list of exceptions (defined in endContrexxCaching()),
     * which will not be cached. Each entry can be:
     * - A component name, this will stop caching for the whole component
     * - An array with the component name as key and a list of conditions as
     *   value. In that case, the sub-conditions can either be a cmd of the
     *   component or a callback (function($page) {}) which returns true
     *   if the exception matches and false otherwise.
     * - A callback (function($cx, $page) {}) which returns true if the
     *   exception matches and false otherwise.
     * @param \Cx\Core\ContentManager\Model\Entity\Page $cx Current page
     * @param \Cx\Core\Core\Controller\Cx Current Cx instance
     * @return boolean True if current request matches an exception, false otherwise
     */
    public function isException($page, $cx)
    {
        foreach ($this->exceptions as $componentName=>$conditions) {
            // find the correct component name
            if (is_numeric($componentName)) {
                if (is_callable($conditions) && $conditions($cx, $page)) {
                    // callback exception matches: do not cache:
                    return true;
                }
                if (!is_string($conditions)) {
                    continue;
                }
                $componentName = $conditions;
            }
            // since we're looking for component exceptions, we only have to check
            // if we have a component page:
            if (
                !$page ||
                $page->getType() != \Cx\Core\ContentManager\Model\Entity\Page::TYPE_APPLICATION
            ) {
                continue;
            }
            // check if the component name matches
            if ($page->getModule() != $componentName) {
                continue;
            }
            // if we have sub-conditions, we need to check them as well:
            if (is_array($conditions)) {
                $match = false;
                foreach ($conditions as $condition) {
                    // sub-condition can be a CMD or a callback
                    if (
                        (
                            is_callable($condition) && $condition($page)
                        ) ||
                        (
                            $page->getCmd() == $condition
                        )
                    ) {
                        // sub-condition matches: do not cache
                        $match = true;
                        break;
                    }
                }
                // no sub-condition has matched, jump to next exception
                if (!$match) {
                    continue;
                }
            }
            // exception has matched (including sub-conditions, if any): do not cache
            return true;
        }
        return false;
    }

    /**
     * Delete all cache files from tmp directory
     */
    public function cleanContrexxCaching()
    {
        $this->_deleteAllFiles();
    }
}
