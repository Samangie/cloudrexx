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
 * Main controller for Search
 *
 * @copyright   Cloudrexx AG
 * @author      Project Team SS4U <info@cloudrexx.com>
 * @package     cloudrexx
 * @subpackage  coremodule_search
 */

namespace Cx\Core_Modules\Search\Controller;

/**
 * Internal Search Exception
 *
 * @copyright   Cloudrexx AG
 * @author      Thomas Wirz <thomas.wirz@cloudrexx.com>
 * @package     cloudrexx
 * @subpackage  coremodule_search
 */
class SearchInternalException extends \Exception {}

/**
 * Main controller for Search
 *
 * @copyright   Cloudrexx AG
 * @author      Project Team SS4U <info@cloudrexx.com>
 * @package     cloudrexx
 * @subpackage  coremodule_search
 */
class ComponentController extends \Cx\Core\Core\Model\Entity\SystemComponentController {

    public function getControllerClasses() {
        // Return an empty array here to let the component handler know that there
        // does not exist a backend, nor a frontend controller of this component.
        return array();
    }

    /**
     * {@inheritDoc}
     */
    public function getCommandsForCommandMode()
    {
        return array('Search');
    }

    /**
     * {@inheritDoc}
     */
    public function executeCommand($command, $arguments, $dataArguments = array())
    {
        // define frontend language
        if (!defined('FRONTEND_LANG_ID')) {
            define('FRONTEND_LANG_ID', 1);
        }

        if ($command == 'Search') {
            $this->executeCommandSearch();
        }
    }

    /**
     * Register your events here
     *
     * Do not do anything else here than list statements like
     * $this->cx->getEvents()->addEvent($eventName);
     */
    public function registerEvents()
    {
        $eventHandlerInstance = $this->cx->getEvents();
        $eventHandlerInstance->addEvent('SearchFindContent');
    }

    /**
     * Load your component.
     *
     * @param \Cx\Core\ContentManager\Model\Entity\Page $page       The resolved page
     */
    public function load(\Cx\Core\ContentManager\Model\Entity\Page $page) {
        global $subMenuTitle, $objTemplate, $_CORELANG, $act;
        switch ($this->cx->getMode()) {
            case \Cx\Core\Core\Controller\Cx::MODE_FRONTEND:
                $pos = (isset($_GET['pos'])) ? intval($_GET['pos']) : '';
                $objSearch = new \Cx\Core_Modules\Search\Controller\Search($page);
                \Env::get('cx')->getPage()->setContent($objSearch->getPage($pos, \Env::get('cx')->getPage()->getContent()));
                break;
            case \Cx\Core\Core\Controller\Cx::MODE_BACKEND:
                $subMenuTitle = $_CORELANG['TXT_SEARCH'];
                $this->cx->getTemplate()->addBlockfile('CONTENT_OUTPUT', 'content_master', 'LegacyContentMaster.html');
                $cachedRoot = $this->cx->getTemplate()->getRoot();
                $this->cx->getTemplate()->setRoot($this->getDirectory() . '/View/Template/Backend');

                $objSearchManager = new \Cx\Core_Modules\Search\Controller\SearchManager($act, $objTemplate, $this->cx->getLicense());
                $objSearchManager->getPage();

                $this->cx->getTemplate()->setRoot($cachedRoot);
                break;
            default:
                break;
        }
    }

    /**
     * Api command for search
     */
    public function executeCommandSearch()
    {
        // fetch the published application page
        try {
            $page = $this->getSearchApplicationPage();
        } catch (SearchInternalException $e) {
            // Component is not published in ContentManager.
            // Let's abort
            echo json_encode(array());
            exit;
        }

        // limit the result to a content branch,
        // but only in case no restriction has already been set for the actual
        // application
        if (
            empty($page->getCmd()) &&
            !empty($_GET['nodeId'])
        ) {
            // set type and module in case pagae is a fallback-page
            $page->setType(\Cx\Core\ContentManager\Model\Entity\Page::TYPE_APPLICATION);
            $page->setModule($this->getName());

            // restrict search result to specific branch 
            $page->setCmd('[[NODE_' . intval($_GET['nodeId']) . ']]');
        }

        $term               = isset($_GET['term']) ? contrexx_input2raw($_GET['term']) : '';
        $arraySearchResults = array();
        if (strlen($term) < 3) {
            echo json_encode(array());
            exit;
        }

        $search = new \Cx\Core_Modules\Search\Controller\Search($page);
        $arraySearchResults = $search->getSearchResult($term);

        echo json_encode($arraySearchResults);
        exit;
    }

    /**
     * Get published application page of this component
     *
     * @return  \Cx\Core\ContentManager\Model\Entity\Page   The published
     *                                                      application page of
     *                                                      this component
     * @throws  SearchInternalException In case no application page of this
     *                                  component is published
     */
    protected function getSearchApplicationPage() {
        $em = $this->cx->getDb()->getEntityManager();
        $pageRepo = $em->getRepository('Cx\Core\ContentManager\Model\Entity\Page');
        $page = $pageRepo->findOneByModuleCmdLang($this->getName(), '', FRONTEND_LANG_ID);

        // check if regular application page is published
        if (
            $page &&
            $page->isActive()
        ) {
            return $page;
        }

        // check if an application page is published that has set a
        // branch restriction
        $cmds = array();
        $pages = $pageRepo->getAllFromModuleCmdByLang($this->getName());
        foreach ($pages as $pagesOfLang) {
            foreach ($pagesOfLang as $page) {
                $cmds[] = $page->getCmd();
            }
        }
        $cmds = array_unique($cmds);
        foreach ($cmds as $cmd) {
            $page = $pageRepo->findOneByModuleCmdLang($this->getName(), $cmd, FRONTEND_LANG_ID);
            if (
                $page &&
                $page->isActive()
            ) {
                return $page;
            }
        }

        throw new SearchInternalException('Application is not published');
    }
}
