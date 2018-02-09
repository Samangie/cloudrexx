<?php

/**
 * Contrexx
 *
 * @link      http://www.contrexx.com
 * @copyright Comvation AG 2007-2014
 * @version   Contrexx 4.0
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
 * "Contrexx" is a registered trademark of Comvation AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

/**
 * ReCaptcha
 *
 * @copyright   CLOUDREXX CMS - CLOUDREXX AG
 * @author      CLOUDREXX Development Team <info@cloudrexx.com>
 * @package     cloudrexx
 * @subpackage  coremodule_captcha
 */

namespace Cx\Core_Modules\Captcha\Controller;


/**
 * ReCaptcha
 *
 * @copyright   CLOUDREXX CMS - CLOUDREXX AG
 * @author      CLOUDREXX Development Team <info@cloudrexx.com>
 * @package     cloudrexx
 * @subpackage  coremodule_captcha
 */
class ReCaptcha implements CaptchaInterface {
    /**
     * @var string
     */
    private $site_key;

    /**
     * @var string
     */
    private $secret_key;

    /**
     * @var string
     */
    private $error = '';

    /**
     * Stores status of CAPTCHA has been successfully validated or not
     * @var boolean
     */
    protected $securityCheck;

    /**
     * Constructor
     */
    public function __construct()
    {
        global $_CONFIG;

        $this->site_key   = $_CONFIG['recaptchaSiteKey'];
        $this->secret_key = $_CONFIG['recaptchaSecretKey'];
    }

    /**
     * Get captcha code
     *
     * @param integer $tabIndex
     *
     * @return string
     */
    public function getCode($tabIndex = null)
    {
        $tabIndexAttr = '';
        if (isset($tabIndex)) {
            $tabIndexAttr = "data-tabindex=\"$tabIndex\"";
        }

        $lang   = \FWLanguage::getLanguageCodeById(FRONTEND_LANG_ID);
        $code   = <<<HTML
<div id="captcha" class="g-recaptcha" data-sitekey="{$this->site_key}" $tabIndexAttr></div>
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=$lang"></script>
HTML;
        return $code;
    }

    /*
     * Get captcha validation code
     *
     * @return string Returns JS code
     */
    public function getJSValidationFn()
    {
        $captchaValidationCode = <<<JSCaptchaValidation
        if (\$J('#captcha').length) {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                isCaptchaOk = false;
            }
        }
JSCaptchaValidation;
        return $captchaValidationCode;
    }

    /**
     * Check the captcha code
     *
     * @return boolean
     */
    public function check()
    {
        if (isset($this->securityCheck)) {
            return $this->securityCheck;
        }

        $reCaptcha = new \ReCaptcha\ReCaptcha($this->secret_key, new \ReCaptcha\RequestMethod\CurlPost());
        $resp = $reCaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if ($resp->isSuccess()) {
            $this->securityCheck = true;
            return true;
        }

        // set error message
        foreach ($resp->getErrorCodes() as $errorCode) {
            $this->error .= $errorCode;
        }

        $this->securityCheck = false;
        return false;
    }
}
