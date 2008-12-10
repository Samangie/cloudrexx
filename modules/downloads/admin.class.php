<?php
if (0) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $objDatabase->debug = 1;
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    $objDatabase->debug = 0;
}
/**
 * Downloads module
 * @copyright   CONTREXX CMS - COMVATION AG
 * @author      Comvation Development Team <info@comvation.com>
 * @version     1.0.0
 * @package     contrexx
 * @subpackage  downloads
 */

/**
 * Includes
 */

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once dirname(__FILE__).'/lib/downloadsLib.class.php';

$_ARRAYLANG['TXT_MANAGE_CATEGORIES'] = "Kategorien verwalten";
$_ARRAYLANG['TXT_ADD_CATEGORY'] = "Kategorie hinzufügen";
$_ARRAYLANG['TXT_SETTINGS'] = "Einstellungen";
$_ARRAYLANG['TXT_PLACEHOLDER'] = "Platzhalter";
$_ARRAYLANG['TXT_MANAGE_FILES'] = "Dateien verwalten";
$_ARRAYLANG['TXT_ADD_FILE'] = "Dateie hinzufügen";
$_ARRAYLANG['TXT_DOWNLOADS_MANAGE_DOWNLOADS'] = "Downloads verwalten";
$_ARRAYLANG['TXT_DOWNLOADS_ADD_DOWNLOAD'] = "Download hinzufügen";
$_ARRAYLANG['TXT_LANGUAGES'] = "Sprachen";
$_ARRAYLANG['TXT_DOWNLOADS_LANGUAGE'] = "Sprache";
$_ARRAYLANG['TXT_NAME'] = "Name";
$_ARRAYLANG['TXT_DESCRIPTION'] = "Beschreibung";
$_ARRAYLANG['TXT_IMAGE'] = "Bild";
$_ARRAYLANG['TXT_BROWSE'] = "Durchsuchen";
$_ARRAYLANG['TXT_DOWNLOADS_ADD_SUCCESSFULL'] = "Erfolgreich hinzugefügt";
$_ARRAYLANG['TXT_DOWNLOADS_ADD_FAILED'] = "Fehler beim speichern";
$_ARRAYLANG['TXT_DOWNLOADS_AUTHOR'] = "Autor";
$_ARRAYLANG['TXT_DOWNLOADS_PERMISSIONS'] = "Zugriffsberechtigungen";
$_ARRAYLANG['TXT_REMOVE_SELECTION'] = "Auswahl entfernen";
$_ARRAYLANG['TXT_SELECT_ACTION'] = "Aktion auswählen";
$_ARRAYLANG['TXT_DOWNLOADS_EDIT_CATEGORY'] = "Kategorie bearbeiten";
$_ARRAYLANG['TXT_DOWNLOADS_UPDATE_SUCCESSFULL'] = "Erfolgreich aktualisiert";
$_ARRAYLANG['TXT_DOWNLOADS_UPDATE_FAILED'] = "Fehler beim Speichern";
$_ARRAYLANG['TXT_DOWNLOADS_ORDER'] = "Reihenfolge";
$_ARRAYLANG['TXT_DOWNLOADS_FILE'] = "Datei";
$_ARRAYLANG['TXT_DOWNLOADS_CATEGORIES'] = "Kategorien";
$_ARRAYLANG['TXT_DOWNLOADS_CATEGORY'] = "Kategorie";
$_ARRAYLANG['TXT_DOWNLOADS_ADDED_CATEGORIES'] = "Hinzugefügte Kategorien";
$_ARRAYLANG['TXT_DOWNLOADS_FILES'] = "Dateien";
$_ARRAYLANG['TXT_DOWNLOADS_STATUS'] = "Status";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE'] = "Typ";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE_UNDEFINED'] = "Undefiniert";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE_IMAGE'] = "Bild";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE_TEXT'] = "Text";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE_MEDIA'] = "Media";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE_ARCHIVE'] = "Archiv";
$_ARRAYLANG['TXT_DOWNLOADS_TYPE_APPLICATION'] = "Applikation";
$_ARRAYLANG['TXT_DOWNLOADS_FILEINFO'] = "Info";
$_ARRAYLANG['TXT_DOWNLOADS_SIZE'] = "Grösse";
$_ARRAYLANG['TXT_DOWNLOADS_LICENSE'] = "Lizenz";
$_ARRAYLANG['TXT_DOWNLOADS_VERSION'] = "Version";
$_ARRAYLANG['TXT_DOWNLOADS_RELATED_DOWNLOADS'] = "Verwandte Downloads";
$_ARRAYLANG['TXT_DOWNLOADS_PROTECTED_DOWNLOAD'] = "Geschützter Download";
$_ARRAYLANG['TXT_DOWNLOADS_YES'] = "Ja";
$_ARRAYLANG['TXT_DOWNLOADS_NO'] = "Nein";
$_ARRAYLANG['TXT_DOWNLOADS_DELETE_SUCCESSFULL'] = "Erfolgreich gelöscht";
$_ARRAYLANG['TXT_DOWNLOADS_DELETE_FAILED'] = "Fehler beim löschen";
$_ARRAYLANG['TXT_DOWNLOADS_EDIT_DOWNLOAD'] = "Download bearbeiten";
$_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_USER_GROUPS'] = "Verfügbare Benutzergruppen";
$_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_USER_GROUPS'] = "Zugewiesene Benutzergruppen";
$_ARRAYLANG['TXT_DOWNLOADS_SOURCE'] = "Source";
$_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_DOWNLOADS'] = "Verfügbare Downloads";
$_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_DOWNLOADS'] = "Zugewiesene Downloads";
$_ARRAYLANG['TXT_DOWNLOADS_STATUS'] = "Status";
$_ARRAYLANG['TXT_DOWNLOADS_DOWNLOADS'] = "Downloads";
$_ARRAYLANG['TXT_DOWNLOADS_ICONS'] = "Icons";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_ID'] = "Eindeutige ID";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_NAME'] = "Name des Downloads";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_DESC'] = "Beschreibung";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_TYPE'] = "Download-Typ (image, text, media, archive, applikation)";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_SIZE'] = "Grösse (KB)";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_IMG'] = "Screenshot/Vorschaubild";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_AUTHOR'] = "Autor";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_CREATED'] = "Datum der Erstellung";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_LICENSE'] = "Lizenz";
$_ARRAYLANG['TXT_PLACEHOLDER_FILE_VERSION'] = "Version";
$_ARRAYLANG['TXT_PLACEHOLDER_CATEGORY_ID'] = "Eindeutige ID";
$_ARRAYLANG['TXT_PLACEHOLDER_CATEGORY_NAME'] = "Name der Kategorie";
$_ARRAYLANG['TXT_PLACEHOLDER_CATEGORY_DESC'] = "Beschreibung";
$_ARRAYLANG['TXT_PLACEHOLDER_ICON_DISPLAY'] = "Ausgabe: block oder none. Je nach Einstellung: Icons oder keine Icons";
$_ARRAYLANG['TXT_PLACEHOLDER_ICON_FILTERS'] = "Filter/Suche-Icon (filter.gif)";
$_ARRAYLANG['TXT_PLACEHOLDER_ICON_INFO'] = "Information-Icon (info.gif)";
$_ARRAYLANG['TXT_PLACEHOLDER_ICON_CATEGORY'] = "Kategorie-Icon (category.gif oder das Kategoriebild)";
$_ARRAYLANG['TXT_PLACEHOLDER_ICON_FILE'] = "Datei/File-Icon. Je nach Downlaodtyp: file.gif, archive.gif, image.gif, media.gif, text.gif";
$_ARRAYLANG['TXT_PLACEHOLDER_ICON_DOWNLOAD'] = "Download-Icon/Button. Je nach Anmeldung: download.gif oder lock.gif";

$_ARRAYLANG['TXT_DOWNLOADS_FILTER'] = "Suche";
$_ARRAYLANG['TXT_DOWNLOADS_DESIGN'] = "Design / Icon-Sets";
$_ARRAYLANG['TXT_DOWNLOADS_NO_ICONS'] = "Keine Icons";
$_ARRAYLANG['TXT_DOWNLOADS_ICON_SET'] = "Icon-Set";


class downloads extends DownloadsLibrary
{
    /**
     * Template object
     *
     * @access private
     * @var object
     */
    var $_objTpl;

   /**
     * Page title
     *
     * @access private
     * @var string
     */
    var $_pageTitle;

   /**
     * Error status message
     *
     * @access private
     * @var string
     */
    var $_strErrMessage = '';

   /**
     * Ok status message
     *
     * @access private
     * @var string
     */
    var $_strOkMessage = '';

    /**
     * Contains the info messages about done operations
     *
     * @var array
     * @access private
     */
    private $arrStatusMsg = array('ok' => array(), 'error' => array());

    private $arrPermissionDependencies = array(
        'read' => array(
            'add_subcategories' => array(
                'manage_subcategories' => null
            ),
            'add_files' => array(
                'manage_files' => null
            )
        )
    );


    /**
     * PHP5 constructor
     *
     * @global object $objTemplate
     * @global array $_ARRAYLANG
     */
    function __construct()
    {
        global $objTemplate, $_ARRAYLANG;

        $this->_objTpl = new HTML_Template_Sigma(ASCMS_MODULE_PATH.'/downloads/template');
        $this->_objTpl->setErrorHandling(PEAR_ERROR_DIE);

        $objTemplate->setVariable("CONTENT_NAVIGATION", "<a href='index.php?cmd=downloads&act=categories'>".$_ARRAYLANG['TXT_MANAGE_CATEGORIES']."</a>
                                                        <a href='index.php?cmd=downloads&act=files'>".$_ARRAYLANG['TXT_DOWNLOADS_MANAGE_DOWNLOADS']."</a>
                                                        <a href='index.php?cmd=downloads&act=placeholder'>".$_ARRAYLANG['TXT_PLACEHOLDER']."</a>
                                                        <a href='index.php?cmd=downloads&act=settings'>".$_ARRAYLANG['TXT_SETTINGS']."</a>
                                                        ");
        parent::__construct();
    }


    /**
     * Set the backend page
     *
     * @access public
     * @global object $objTemplate
     * @global array $_ARRAYLANG
     */
    function getPage()
    {
        global $objTemplate, $_ARRAYLANG;
        if (!isset($_REQUEST['act'])) {
            $_REQUEST['act'] = '';
        }

        switch ($_REQUEST['act']) {
            case 'files':
                $this->_files();
                break;

            case 'delete_category':
                $this->deleteCategory();
                $this->categories();
                break;

            case 'switch_category_status':
                $this->switchCategoryStatus();
                $this->categories();
                break;

            case 'categories':
                $this->categories();
                break;
            case 'category':
                $this->category();
                break;
            case 'placeholder':
                $this->_placeholder();
                break;
            case 'settings':
                $this->_settings();
                break;
            case 'download':
                $this->_download();
                break;
            default:
                $this->categories();
                break;
        }

        $objTemplate->setVariable(array(
            'CONTENT_TITLE'             => $this->_pageTitle,
            'CONTENT_OK_MESSAGE'        => implode("<br />\n", $this->arrStatusMsg['ok']),
            'CONTENT_STATUS_MESSAGE'    => implode("<br />\n", $this->arrStatusMsg['error']),
            'ADMIN_CONTENT'             => $this->_objTpl->get()
        ));
    }

    private function deleteCategory()
    {
        global $_LANGID;

        $objCategory = Category::getCategory(isset($_GET['id']) ? intval($_GET['id']) : 0);

        if (!$objCategory->EOF) {
            $name = '<strong>'.htmlentities($objCategory->getName($_LANGID), ENT_QUOTES, CONTREXX_CHARSET).'</strong>';
            if ($objCategory->delete()) {
                $this->arrStatusMsg['ok'][] = sprintf('Die Kategorie %s wurde erfolgreich gelöscht.', $name);
            }
        }
    }

    private function switchCategoryStatus()
    {
        $objCategory = Category::getCategory(isset($_GET['id']) ? intval($_GET['id']) : 0);
        if (!$objCategory->EOF) {
            $objCategory->setActiveStatus(!$objCategory->getActiveStatus());
            $objCategory->store();
        }
    }

    /**
     * category edit
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
     */
    private function category()
    {
        global $_ARRAYLANG, $objLanguage, $_LANGID;



        $objFWUser = FWUser::getFWUserObject();
        $objCategory = Category::getCategory(isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0);


        //$arrCategory = $this->getCategory(isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0);

        if (!isset($objLanguages)) {
            $objLanguages = new FWLanguage();
        }

        if (isset($_POST['downloads_category_save'])) {
            // check if user is allowed to change that stuff
            // check if the user is allowed to create a category within the selected parentId
            $objCategory->setParentId(isset($_POST['downloads_category_parent_id']) ? intval($_POST['downloads_category_parent_id']) : 0);
            $objCategory->setActiveStatus(isset($_POST['downloads_category_active']) && $_POST['downloads_category_active']);
            $objCategory->setImage(isset($_POST['downloads_category_image']) ? contrexx_stripslashes($_POST['downloads_category_image']) : '');
            $objCategory->setVisibility((!isset($_POST['downloads_category_read']) || !$_POST['downloads_category_read']) || isset($_POST['downloads_category_visibility']) && $_POST['downloads_category_visibility']);
            $objCategory->setNames(isset($_POST['downloads_category_name']) ? array_map('trim', array_map('contrexx_stripslashes', $_POST['downloads_category_name'])) : array());
            $objCategory->setDescriptions(isset($_POST['downloads_category_description']) ? array_map('trim', array_map('contrexx_stripslashes', $_POST['downloads_category_description'])) : array());

            if (Permission::checkAccess(142, 'static', true)) {
                $objCategory->setOwner(isset($_POST['downloads_category_owner_id']) ? intval($_POST['downloads_category_owner_id']) : $objFWUser->objUser->getId());
                $objCategory->setDeletableByOwner($objCategory->getOwnerId() == $objFWUser->objUser->getId() || isset($_POST['downloads_category_deletable_by_owner']) && $_POST['downloads_category_deletable_by_owner']);
                $objCategory->setModifyAccessByOwner($objCategory->getOwnerId() == $objFWUser->objUser->getId() || isset($_POST['downloads_category_manage_by_owner']) && $_POST['downloads_category_manage_by_owner']);
            }

            foreach ($this->arrPermissionTypes as $protectionType) {
                $arrCategoryPermissions[$protectionType]['protected'] = isset($_POST['downloads_category_'.$protectionType]) && $_POST['downloads_category_'.$protectionType];
                $arrCategoryPermissions[$protectionType]['groups'] = !empty($_POST['downloads_category_'.$protectionType.'_associated_groups']) ? array_map('intval', $_POST['downloads_category_'.$protectionType.'_associated_groups']) : array();
            }


            $objCategory->setPermissions($arrCategoryPermissions);

            if ($objCategory->store()) {
                return $this->categories();
            } else {
                $this->arrStatusMsg['error'] = array_merge($this->arrStatusMsg['error'], $objCategory->getErrorMsg());
            }

                // TODO: add store methode

//                foreach ($arrCategory['tmp_permissions'] as $permission => $arrPermission) {
//                    //$this->setProtection($arrPermission['protected'], $arrCategory[$permission.'_access_id'], $arrPermission['groups']);
//                }






        } else {
            $objCategory->setParentId(isset($_REQUEST['parent_id']) ? intval($_REQUEST['parent_id']) : 0);
        }

        $this->_pageTitle = $objCategory->getId() ? $_ARRAYLANG['TXT_DOWNLOADS_ADD_CATEGORY'] : $_ARRAYLANG['TXT_DOWNLOADS_EDIT_CATEGORY'];
        $this->_objTpl->loadTemplateFile('module_downloads_category_modify.html');

        /*
TXT_DOWNLOADS_GENERAL
TXT_DOWNLOADS_PERMISSIONS
TXT_DOWNLOADS_ADD_CATEGORY
TXT_DOWNLOADS_EDIT_CATEGORY
TXT_DOWNLOADS_NAME
TXT_DOWNLOADS_EXTENDED
TXT_DOWNLOADS_DESCRIPTION
TXT_DOWNLOADS_OWNER
TXT_DOWNLOADS_IMAGE
TXT_DOWNLOADS_CATEGORY_IMAGE
TXT_DOWNLOADS_REMOVE_IMAGE
TXT_DOWNLOADS_VIEW_CONTENT
TXT_DOWNLOADS_AVAILABLE_GROUPS
TXT_DOWNLOADS_CHECK_ALL
TXT_DOWNLOADS_UNCHECK_ALL
TXT_DOWNLOADS_ASSOCIATED_GROUPS
//TXT_DOWNLOADS_ADD_SUBCATEGORIES
//TXT_DOWNLOADS_MANAGE_SUBCATEGORIES
//TXT_DOWNLOADS_ADD_FILES
//TXT_DOWNLOADS_MANAGE_FILES
TXT_DOWNLOADS_CANCEL
TXT_DOWNLOADS_SAVE
TXT_DOWNLOADS_ACTIVE
TXT_DOWNLOADS_SUBCATEGORIES
TXT_DOWNLOADS_ADD
TXT_DOWNLOADS_MANAGE
TXT_DOWNLOADS_CATEGORY_DELETABLE_BY_OWNER
TXT_DOWNLOADS_CATEGORY_MANAGE_BY_OWNER
TXT_DOWNLOADS_CATEG0RY_VISIBILITY_DESC
         */


        $this->_objTpl->setVariable(array(
            'TXT_DOWNLOADS_GENERAL'                                     => $_ARRAYLANG['TXT_DOWNLOADS_GENERAL'],
            'TXT_DOWNLOADS_PERMISSIONS'                                 => $_ARRAYLANG['TXT_DOWNLOADS_PERMISSIONS'],
            'TXT_DOWNLOADS_NAME'                                        => $_ARRAYLANG['TXT_DOWNLOADS_NAME'],
            'TXT_DOWNLOADS_DESCRIPTION'                                 => $_ARRAYLANG['TXT_DOWNLOADS_DESCRIPTION'],
            'TXT_DOWNLOADS_ACTIVE'                                      => $_ARRAYLANG['TXT_DOWNLOADS_ACTIVE'],
            'TXT_DOWNLOADS_OWNER'                                       => $_ARRAYLANG['TXT_DOWNLOADS_OWNER'],
            'TXT_DOWNLOADS_IMAGE'                                       => $_ARRAYLANG['TXT_DOWNLOADS_IMAGE'],
            'TXT_DOWNLOADS_CATEGORY_IMAGE'                              => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORY_IMAGE'],
            'TXT_DOWNLOADS_REMOVE_IMAGE'                                => $_ARRAYLANG['TXT_DOWNLOADS_REMOVE_IMAGE'],
            'TXT_DOWNLOADS_FILES'                                       => $_ARRAYLANG['TXT_DOWNLOADS_FILES'],
            'TXT_DOWNLOADS_AVAILABLE_USER_GROUPS'                       => $_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_USER_GROUPS'],
            'TXT_DOWNLOADS_ASSIGNED_USER_GROUPS'                        => $_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_USER_GROUPS'],
            'TXT_DOWNLOADS_CHECK_ALL'                                   => $_ARRAYLANG['TXT_DOWNLOADS_CHECK_ALL'],
            'TXT_DOWNLOADS_UNCHECK_ALL'                                 => $_ARRAYLANG['TXT_DOWNLOADS_UNCHECK_ALL'],
            'TXT_DOWNLOADS_VIEW_CONTENT'                                => $_ARRAYLANG['TXT_DOWNLOADS_VIEW_CONTENT'],
            'TXT_DOWNLOADS_SUBCATEGORIES'                               => $_ARRAYLANG['TXT_DOWNLOADS_SUBCATEGORIES'],
            'TXT_DOWNLOADS_ADD'                                         => $_ARRAYLANG['TXT_DOWNLOADS_ADD'],
            'TXT_DOWNLOADS_MANAGE'                                      => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE'],
            'TXT_DOWNLOADS_CATEGORY_DELETABLE_BY_OWNER'                 => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORY_DELETABLE_BY_OWNER'],
            'TXT_DOWNLOADS_CATEGORY_MANAGE_BY_OWNER'                    => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORY_MANAGE_BY_OWNER'],
//            'TXT_DOWNLOADS_ADD_SUBCATEGORIES'                           => $_ARRAYLANG['TXT_DOWNLOADS_ADD_SUBCATEGORIES'],
//            'TXT_DOWNLOADS_MANAGE_SUBCATEGORIES'                        => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_SUBCATEGORIES'],
//            'TXT_DOWNLOADS_ADD_FILES'                                   => $_ARRAYLANG['TXT_DOWNLOADS_ADD_FILES'],
//            'TXT_DOWNLOADS_MANAGE_FILES'                                => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_FILES'],
            'TXT_DOWNLOADS_CANCEL'                                      => $_ARRAYLANG['TXT_DOWNLOADS_CANCEL'],
            'TXT_DOWNLOADS_SAVE'                                        => $_ARRAYLANG['TXT_DOWNLOADS_SAVE'],
            'TXT_DOWNLOADS_BROWSE'                                      => $_ARRAYLANG['TXT_DOWNLOADS_BROWSE'],
            'TXT_DOWNLOADS_CATEG0RY_VISIBILITY_DESC'                    => $_ARRAYLANG['TXT_DOWNLOADS_CATEG0RY_VISIBILITY_DESC'],
            'TXT_DOWNLOADS_READ_ALL_ACCESS_DESC'                        => $_ARRAYLANG['TXT_DOWNLOADS_READ_ALL_ACCESS_DESC'],
            'TXT_DOWNLOADS_READ_SELECTED_ACCESS_DESC'                   => $_ARRAYLANG['TXT_DOWNLOADS_READ_SELECTED_ACCESS_DESC'],
            'TXT_DOWNLOADS_ADD_SUBCATEGORIES_ALL_ACCESS_DESC'           => $_ARRAYLANG['TXT_DOWNLOADS_ADD_SUBCATEGORIES_ALL_ACCESS_DESC'],
            'TXT_DOWNLOADS_ADD_SUBCATEGORIES_SELECTED_ACCESS_DESC'      => $_ARRAYLANG['TXT_DOWNLOADS_ADD_SUBCATEGORIES_SELECTED_ACCESS_DESC'],
            'TXT_DOWNLOADS_MANAGE_SUBCATEGORIES_ALL_ACCESS_DESC'        => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_SUBCATEGORIES_ALL_ACCESS_DESC'],
            'TXT_DOWNLOADS_MANAGE_SUBCATEGORIES_SELECTED_ACCESS_DESC'   => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_SUBCATEGORIES_SELECTED_ACCESS_DESC'],
            'TXT_DOWNLOADS_ADD_FILES_ALL_ACCESS_DESC'                   => $_ARRAYLANG['TXT_DOWNLOADS_ADD_FILES_ALL_ACCESS_DESC'],
            'TXT_DOWNLOADS_ADD_FILES_SELECTED_ACCESS_DESC'              => $_ARRAYLANG['TXT_DOWNLOADS_ADD_FILES_SELECTED_ACCESS_DESC'],
            'TXT_DOWNLOADS_MANAGE_FILES_ALL_ACCESS_DESC'                => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_FILES_ALL_ACCESS_DESC'],
            'TXT_DOWNLOADS_MANAGE_FILES_SELECTED_ACCESS_DESC'           => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_FILES_SELECTED_ACCESS_DESC']
        ));


        // parse general attributes
        $this->_objTpl->setVariable(array(
            'DOWNLOADS_CATEGORY_ID'                         => $objCategory->getId(),
            'DOWNLOADS_CATEGORY_PARENT_ID'                  => $objCategory->getParentId(),
            'DOWNLOADS_CATEGORY_OPERATION_TITLE'            => $objCategory->getId() ? $_ARRAYLANG['TXT_DOWNLOADS_ADD_CATEGORY'] : $_ARRAYLANG['TXT_DOWNLOADS_EDIT_CATEGORY'],
            'DOWNLOADS_CATEGORY_OWNER'                      => Permission::checkAccess(142, 'static', true) ? $this->getUserDropDownMenu($objCategory->getOwnerId(), $objFWUser->objUser->getId()) : $this->getParsedUsername($objCategory->getOwnerId()),
            'DOWNLOADS_CATEGORY_OWNER_CONFIG_DISPLAY'       => Permission::checkAccess(142, 'static', true) && $objCategory->getOwnerId() != $objFWUser->objUser->getId() ? '' : 'none',
            'DOWNLOADS_CATEGORY_DELETABLE_BY_OWNER_CHECKED' => $objCategory->getDeletableByOwner() ? 'checked="checked"' : '',
            'DOWNLOADS_CATEGORY_MANAGE_BY_OWNER_CHECKED'    => $objCategory->getModifyAccessByOwner() ? 'checked="checked"' : '',
            'DOWNLOADS_CATEGORY_ACTIVE_CHECKED'             => $objCategory->getActiveStatus() ? 'checked="checked"' : '',
            'DOWNLOADS_CATEGORY_VISIBILITY_CHECKED'         => $objCategory->getVisibility() ? 'checked="checked"' : ''
        ));


        // parse image attribute
        $image = $objCategory->getImage();
        if (!empty($image) && file_exists(ASCMS_PATH.$image)) {
            if (file_exists(ASCMS_PATH.$image.'.thumb')) {
                $imageSrc = $image.'.thumb';
            } else {
                $imageSrc = $image;
            }
        } else {
            $image = '';
            $imageSrc = $this->defaultCategoryImage['src'];
        }

        $this->_objTpl->setVariable(array(
            'DOWNLOADS_CATEGORY_IMAGE'                  => $image,
            'DOWNLOADS_CATEGORY_IMAGE_SRC'              => $imageSrc,
            'DOWNLOADS_DEFAULT_CATEGORY_IMAGE'          => $this->defaultCategoryImage['src'],
            'DOWNLOADS_DEFAULT_CATEGORY_IMAGE_WIDTH'    => $this->defaultCategoryImage['width'].'px',
            'DOWNLOADS_DEFAULT_CATEGORY_IMAGE_HEIGHT'   => $this->defaultCategoryImage['height'].'px',
            'DOWNLOADS_CATEGORY_IMAGE_REMOVE_DISPLAY'   => empty($image) ? 'none' : ''
        ));


        // parse name and description attributres
        if (!isset($arrLanguages)) {
            $arrLanguages = $objLanguage->getLanguageArray();
        }
        foreach ($arrLanguages as $langId => $arrLanguage) {
            $this->_objTpl->setVariable(array(
                'DOWNLOADS_CATEGORY_NAME'       => htmlentities($objCategory->getName($langId), ENT_QUOTES, CONTREXX_CHARSET),
                'DOWNLOADS_CATEGORY_LANG_ID'    => $langId,
                'DOWNLOADS_CATEGORY_LANG_NAME'  => htmlentities($arrLanguage['name'], ENT_QUOTES, CONTREXX_CHARSET)
            ));
            $this->_objTpl->parse('downloads_category_name_list');

            $this->_objTpl->setVariable(array(
                'DOWNLOADS_CATEGORY_DESCRIPTION'        => htmlentities($objCategory->getDescription($langId), ENT_QUOTES, CONTREXX_CHARSET),
                'DOWNLOADS_CATEGORY_LANG_ID'            => $langId,
                'DOWNLOADS_CATEGORY_LANG_DESCRIPTION'   => htmlentities($arrLanguage['name'], ENT_QUOTES, CONTREXX_CHARSET)
            ));
            $this->_objTpl->parse('downloads_category_description_list');
        }

        $this->_objTpl->setVariable(array(
            'DOWNLOADS_CATEGORY_NAME'   => htmlentities($objCategory->getName($_LANGID), ENT_QUOTES, CONTREXX_CHARSET),
            'TXT_DOWNLOADS_EXTENDED'    => $_ARRAYLANG['TXT_DOWNLOADS_EXTENDED']
        ));
        $this->_objTpl->parse('downloads_category_name');

        $this->_objTpl->setVariable(array(
            'DOWNLOADS_CATEGORY_DESCRIPTION'    => htmlentities($objCategory->getDescription($_LANGID), ENT_QUOTES, CONTREXX_CHARSET),
            'TXT_DOWNLOADS_EXTENDED'            => $_ARRAYLANG['TXT_DOWNLOADS_EXTENDED']
        ));
        $this->_objTpl->parse('downloads_category_description');


        // parse access permissions
        $arrPermissions = $objCategory->getPermissions();

        $objGroup = $objFWUser->objGroup->getGroups();
        while (!$objGroup->EOF) {
            $option = '<option value="'.$objGroup->getId().'">'.htmlentities($objGroup->getName(), ENT_QUOTES, CONTREXX_CHARSET).' ['.$objGroup->getType().']</option>';

            foreach ($this->arrPermissionTypes as $permissionType) {
                if (in_array($objGroup->getId(), $arrPermissions[$permissionType]['groups'])) {
                    $arrPermissions[$permissionType]['associated_groups'][] = $option;
                } else {
                    $arrPermissions[$permissionType]['not_associated_groups'][] = $option;
                }
            }

            $objGroup->next();
        }

        foreach ($arrPermissions as $permissionType => $arrPermissionType) {
            $permissionTypeUC = strtoupper($permissionType);
            $this->_objTpl->setVariable(array(
                'DOWNLOADS_CATEGORY_'.$permissionTypeUC.'_ALL_CHECKED'              => !$arrPermissionType['protected'] ? 'checked="checked"' : '',
                'DOWNLOADS_CATEGORY_'.$permissionTypeUC.'_SELECTED_CHECKED'         => $arrPermissionType['protected'] ? 'checked="checked"' : '',
                'DOWNLOADS_CATEGORY_'.$permissionTypeUC.'_DISPLAY'                  => $arrPermissionType['protected'] ? '' : 'none',
                'DOWNLOADS_CATEGORY_'.$permissionTypeUC.'_NOT_ASSOCIATED_GROUPS'    => implode("\n", $arrPermissionType['not_associated_groups']),
                'DOWNLOADS_CATEGORY_'.$permissionTypeUC.'_ASSOCIATED_GROUPS'        => implode("\n", $arrPermissionType['associated_groups'])
            ));
        }



/*
$this->_objTpl->setVariable(array(
    'DOWNLOADS_CATEGORY_READ_ACCESS_ALL_CHECKED'
    'DOWNLOADS_CATEGORY_READ_ACCESS_SELECTED_CHECKED'
    'DOWNLOADS_CATEGORY_READ_ACCESS_DISPLAY'
    'DOWNLOADS_CATEGORY_READ_ACCESS_NOT_ASSOCIATED_GROUPS'  =>
    'DOWNLOADS_CATEGORY_READ_ACCESS_ASSOCIATED_GROUPS'
));

'DOWNLOADS_CATEGORY_ADD_SUBCATEGORIES_ALL_CHECKED'
'DOWNLOADS_CATEGORY_ADD_SUBCATEGORIES_SELECTED_CHECKED'
'DOWNLOADS_CATEGORY_ADD_SUBCATEGORIES_DISPLAY'
'DOWNLOADS_CATEGORY_ADD_SUBCATEGORIES_NOT_ASSOCIATED_GROUPS'
'DOWNLOADS_CATEGORY_ADD_SUBCATEGORIES_ASSOCIATED_GROUPS'

'DOWNLOADS_CATEGORY_MANAGE_SUBCATEGORIES_ALL_CHECKED'
'DOWNLOADS_CATEGORY_MANAGE_SUBCATEGORIES_SELECTED_CHECKED'
'DOWNLOADS_CATEGORY_MANAGE_SUBCATEGORIES_DISPLAY'
'DOWNLOADS_CATEGORY_MANAGE_SUBCATEGORIES_NOT_ASSOCIATED_GROUPS'
'DOWNLOADS_CATEGORY_MANAGE_SUBCATEGORIES_ASSOCIATED_GROUPS'

'DOWNLOADS_CATEGORY_ADD_FILES_ALL_CHECKED'
'DOWNLOADS_CATEGORY_ADD_FILES_SELECTED_CHECKED'
'DOWNLOADS_CATEGORY_ADD_FILES_DISPLAY'
'DOWNLOADS_CATEGORY_ADD_FILES_NOT_ASSOCIATED_GROUPS'
'DOWNLOADS_CATEGORY_ADD_FILES_ASSOCIATED_GROUPS'

'DOWNLOADS_CATEGORY_MANAGE_FILES_ALL_CHECKED'
'DOWNLOADS_CATEGORY_MANAGE_FILES_SELECTED_CHECKED'
'DOWNLOADS_CATEGORY_MANAGE_FILES_DISPLAY'
'DOWNLOADS_CATEGORY_MANAGE_FILES_NOT_ASSOCIATED_GROUPS'
'DOWNLOADS_CATEGORY_MANAGE_FILES_ASSOCIATED_GROUPS'
*/


//
//
//        $category = intval($_REQUEST["id"]);
//        if ($category<1) {
//            header('location: index.php?cmd=downloads&act=categories');
//            exit;
//        }
//
//        $CategoriyInfo = $this->_CategoryInfo($category);
//        // -----------------------------------------
//        // checkboxes & languagetabs 4 languages
//        // -----------------------------------------
//        $checkboxesSource = '';
//        $languageTabsNavi = '';
//        $languageTabsSource = '';
//        $js_arr = '';
//        $hideJS = '';
//        $fieldsArray = array();
//        $LiClass = 'active';
//        $StyleDisplay = 'block';
//        foreach ($this->_arrLang as $langId => $LangInfo) {
//            $fieldsArray = array('category_name_'.$langId => array('name' => $_ARRAYLANG['TXT_NAME'], 'value' => $CategoriyInfo['category_loc']['lang'][$langId]['name'], 'rte' => 0), 'category_desc_'.$langId => array('name' => $_ARRAYLANG['TXT_DESCRIPTION'], 'value' => $CategoriyInfo['category_loc']['lang'][$langId]['desc'], 'rte' => 2));
//
//            /*
//            if ($this->_CatLang($category, $langId)) {
//                $checked = 'checked="checked"';
//            } else {
//                $checked = '';
//                $hideJS .= '
//                document.getElementById("addEntry_'.$LangInfo['name'].'").style.display = "none";';
//            }
//            */
//
//            $checkboxesSource .= '<td><input  name="frmEditEntry_Languages[]" value="'.$langId.'" onclick="switchBoxAndTab(this, \'addEntry_'.$LangInfo['name'].'\');" type="checkbox" />'.$LangInfo['name'].' ['.$LangInfo['lang'].']</td>';
//            $languageTabsNavi .= '<li><a id="addEntry_'.$LangInfo['name'].'" class="'.$LiClass.'" href="javascript:{}" onclick="selectTab(\''.$LangInfo['name'].'\')" title="'.$LangInfo['name'].'" style="display: inline;">'.$LangInfo['name'].'</a></li>';
//            $LiClass = 'inactive';
//            $languageTabsSource .= $this->_LangTabHTML($LangInfo['name'], 'display: '.$StyleDisplay.';', $LangInfo['name'], $fieldsArray);
//            $StyleDisplay = 'none';
//            $js_arr .= 'arrTabToDiv["addEntry_'.$LangInfo['name'].'"] = "'.$LangInfo['name'].'"; ';
//        }
//
//        $languageTabsNavi = '<ul id="tabmenu">'.$languageTabsNavi.'</ul>';
//        $GroupsSelect = $this->_permissionsSelect('AddCategory');
//
//        $this->_objTpl->setVariable(array(
//            'TXT_DOWNLOADS_EDIT_CATEGORY' => $_ARRAYLANG['TXT_DOWNLOADS_EDIT_CATEGORY'],
//            'TXT_LANGUAGES' => $_ARRAYLANG['TXT_LANGUAGES'],
//            'TXT_IMAGE' => $_ARRAYLANG['TXT_IMAGE'],
//            'TXT_BROWSE' => $_ARRAYLANG['TXT_BROWSE'],
//            'TXT_SAVE' => $_ARRAYLANG['TXT_SAVE'],
//            'TXT_AUTHOR' => $_ARRAYLANG['TXT_DOWNLOADS_AUTHOR'],
//            'TXT_DOWNLOADS_PERMISSIONS' => $_ARRAYLANG['TXT_DOWNLOADS_PERMISSIONS'],
//            'GROUP_SELECT' => $GroupsSelect,
//            'LANG_SELECT' => $checkboxesSource,
//            'LANG_TABS' => $languageTabsSource,
//            'LANG_TAB_NAVI' => $languageTabsNavi,
//            'JS_ARR' => $js_arr,
//            'JS_HIDE' => $hideJS
//        ));
//
//        $this->_objTpl->setVariable(array(
//            'VALUE_AUTHOR' => $CategoriyInfo["category_author"],
//            'VALUE_IMG' => $CategoriyInfo["category_img"],
//            'VALUE_ID' => $category,
//        ));

    }



//    private function getParsedAccessPermissions($arrCategory)
//    {
//        $arrPermissions = array();
//        $objFWUser = FWUser::getFWUserObject();
//
//        foreach ($this->arrPermissionTypes as $permissionType) {
//            $arrPermissions[$permissionType] = array(
//                'set'                   => false,
//                'group_ids'             => array(),
//                'not_associated_groups' => array(),
//                'associated_groups'     => array()
//            );
//
//            if (isset($arrCategory['tmp_permissions'])) {
//                if ($arrCategory['tmp_permissions'][$permissionType]['protected']) {
//                    $arrPermissions[$permissionType]['set'] = true;
//                    $arrPermissions[$permissionType]['group_ids'] = $arrCategory['tmp_permissions'][$permissionType]['groups'];
//                }
//            } elseif ($arrCategory[$permissionType.'_access_id']) {
//                $arrPermissions[$permissionType]['set'] = true;
//                $objGroup = $objFWUser->objGroup->getGroups(array('dynamic' => $arrCategory[$permissionType.'_access_id']));
//                $arrPermissions[$permissionType]['group_ids'] = $objGroup->getLoadedGroupIds();
//            }
//        }
//
//        $objGroup = $objFWUser->objGroup->getGroups();
//        while (!$objGroup->EOF) {
//            $option = '<option value="'.$objGroup->getId().'">'.htmlentities($objGroup->getName(), ENT_QUOTES, CONTREXX_CHARSET).' ['.$objGroup->getType().']</option>';
//
//            foreach ($this->arrPermissionTypes as $permissionType) {
//                if (in_array($objGroup->getId(), $arrPermissions[$permissionType]['group_ids'])) {
//                    $arrPermissions[$permissionType]['associated_groups'][] = $option;
//                } else {
//                    $arrPermissions[$permissionType]['not_associated_groups'][] = $option;
//                }
//            }
//
//            $objGroup->next();
//        }
//
//        return $arrPermissions;
//    }


    /**
     * download edit
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
     */
    function _download()
    {
        global $_ARRAYLANG, $objDatabase;
        $this->_pageTitle = $_ARRAYLANG['TXT_DOWNLOADS_EDIT_DOWNLOAD'];
        $this->_objTpl->loadTemplateFile('download.html');

        $download_id = intval($_REQUEST["id"]);
        $DownloadInfo = $this->_FileInfo($download_id);

        if ($DownloadInfo["file_name"]!="") {
            $RadioFile_1 = "checked";
        } else {
            $RadioFile_2 = "checked";
        }

        $languageTabsSource = '';
        $languageTabsNavi = '';
        $fieldsArray = array();
        $LiClass = 'active';
        $StyleDisplay = 'block';
        foreach ($this->_arrLang as $langId => $LangInfo) {
            $fieldsArray = array('file_name_'.$langId => array('name' => $_ARRAYLANG['TXT_NAME'], 'value' => $DownloadInfo['file_loc']['lang'][$langId]['name'], 'rte' => 0), 'file_desc_'.$langId => array('name' => $_ARRAYLANG['TXT_DESCRIPTION'], 'value' => $DownloadInfo['file_loc']['lang'][$langId]['desc'], 'rte' => 2));
            $languageTabsSource .= $this->_LangTabHTML($LangInfo['name'], 'display: '.$StyleDisplay.';', $LangInfo['name'], $fieldsArray);
            $languageTabsNavi .= '<li><a id="addEntry_'.$LangInfo['name'].'" class="'.$LiClass.'" href="javascript:{}" onclick="selectTab(\''.$LangInfo['name'].'\')" title="'.$LangInfo['name'].'" style="display: inline;">'.$LangInfo['name'].'</a></li>';
            $LiClass = 'inactive';
            $StyleDisplay = 'none';
// TODO: Never used
//            $js_arr .= 'arrTabToDiv["addEntry_'.$LangInfo['name'].'"] = "'.$LangInfo['name'].'"; ';
        }
        $languageTabsNavi = '<ul id="tabmenu">'.$languageTabsNavi.'</ul>';

        $TypeSelected_1 = '';
        $TypeSelected_2 = '';
        $TypeSelected_3 = '';
        $TypeSelected_4 = '';
        switch ($DownloadInfo["file_type"]) {
            case "image":
                $TypeSelected_1 = 'selected';
                break;
            case "text":
                $TypeSelected_2 = 'selected';
                break;
            case "media":
                $TypeSelected_3 = 'selected';
                break;
            case "archive":
                $TypeSelected_4 = 'selected';
                break;
        }

        $ValueCategories = '';
        $ValueAddedCategories = '';

        $query = "
            SELECT category_id
            FROM ".DBPREFIX."module_downloads_categories
            ORDER BY category_order";
        $objResult = $objDatabase->Execute($query);

        if ($objResult) {
            while (!$objResult->EOF) {
                $CategoryInfo = $this->_CategoryInfo($objResult->fields["category_id"]);
                $added = false;
                for($xx=0; $xx<count($DownloadInfo['file_categories']); $xx++) {
                    if ($DownloadInfo['file_categories'][$xx]['id']==$objResult->fields["category_id"]) {
                        $added = true;
                    }
                }
                if ($added) {
                    $ValueAddedCategories .= '<option value="'.$objResult->fields["category_id"].'">'.$CategoryInfo['category_loc'][0]['name'].'</option>\n';
                } else {
                    $ValueCategories .= '<option value="'.$objResult->fields["category_id"].'">'.$CategoryInfo['category_loc'][0]['name'].'</option>\n';
                }
                $objResult->MoveNext();
            }
        }

        $protected_yes = '';
        $protected_no = '';
        if ($DownloadInfo["file_protected"]==1) {
            $protected_yes = 'checked';
        } else {
            $protected_no = 'checked';
        }

        // --------------
        // Frontend Groups
        $valueGroups = '';
        $valueAddedGroups = '';
        //$arrAssignedFrontendGroups=$this->_getAssignedGroups($groupType="frontend",$pageId);

        $objFWUser = FWUser::getFWUserObject();
        $objGroup = $objFWUser->objGroup->getGroups(array('type' => 'frontend'));
        while (!$objGroup->EOF) {
            $added = false;
            for($xx=0; $xx<count($DownloadInfo['file_access_groups']); $xx++) {
                if ($DownloadInfo['file_access_groups'][$xx]['id']==$objGroup->getId()) {
                    $added = true;
                }
            }
            if ($added) {
                $valueAddedGroups .="<option value=\"".$objGroup->getId()."\">".htmlentities($objGroup->getName(), ENT_QUOTES, CONTREXX_CHARSET)."</option>\n";
            } else {
                $valueGroups .="<option value=\"".$objGroup->getId()."\">".htmlentities($objGroup->getName(), ENT_QUOTES, CONTREXX_CHARSET)."</option>\n";
            }

            $objGroup->next();
        }

        // related downloads
        // ------------------------
        $query = "
                SELECT file_id, file_name
                FROM ".DBPREFIX."module_downloads_files
                ORDER BY file_name";
        $objResult = $objDatabase->Execute($query);
        $ValueDownloads = '';
        $ValueAddedDownloads = '';
        if ($objResult) {
            while (!$objResult->EOF) {
                $fileInfo = $this->_FileInfo($objResult->fields["file_id"]);
                $added = false;
                for($xx=0; $xx<count($DownloadInfo['file_related_files']); $xx++) {
                    if ($DownloadInfo['file_related_files'][$xx]['id']==$objResult->fields["file_id"]) {
                        $added = true;
                    }
                }

                $fileName = $fileInfo["file_name"];
                if ($fileName=="") {
                    $fileName = $fileInfo["file_url"];
                }

                if ($added) {
                    $ValueAddedDownloads .= '<option value="'.$fileInfo["file_id"].'">'.$fileInfo["file_loc"][0]["name"].'</option>';
                } else {
                    if ($fileInfo["file_id"]!=$DownloadInfo["file_id"]) {
                        $ValueDownloads .= '<option value="'.$fileInfo["file_id"].'">'.$fileInfo["file_loc"][0]["name"].'</option>';
                    }
                }
                $objResult->MoveNext();
            }
        }

        if ($DownloadInfo["file_name"]=="") {
            $js_fileswitch = "FileSwitch('DIVfile_url', 'DIVfile_source');";
        }

        if ($DownloadInfo["file_protected"]==0) {
            $js_groupselect = 'HideGroupSelect();';
        }

        if ($DownloadInfo["file_state"]==1) {
            $state_checked = 'checked';
        } else {
            $state_checked = '';
        }

        $this->_objTpl->setVariable(array(
            'TXT_DOWNLOADS_EDIT_DOWNLOAD' => $_ARRAYLANG["TXT_DOWNLOADS_EDIT_DOWNLOAD"],
            'TXT_MANAGE_FILES' => $_ARRAYLANG['TXT_MANAGE_FILES'],
            'TXT_ADD_FILE' => $_ARRAYLANG['TXT_ADD_FILE'],
            'TXT_DOWNLOADS_MANAGE_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_DOWNLOADS'],
            'TXT_DOWNLOADS_ADD_DOWNLOAD' => $_ARRAYLANG['TXT_DOWNLOADS_ADD_DOWNLOAD'],
            'TXT_AUTHOR' => $_ARRAYLANG['TXT_DOWNLOADS_AUTHOR'],
            'TXT_DOWNLOADS_FILE' => $_ARRAYLANG['TXT_DOWNLOADS_FILE'],
            'TXT_IMAGE' => $_ARRAYLANG['TXT_IMAGE'],
            'TXT_BROWSE' => $_ARRAYLANG['TXT_BROWSE'],
            'TXT_LANGUAGES' => $_ARRAYLANG['TXT_LANGUAGES'],
            'TXT_DOWNLOADS_PERMISSIONS' => $_ARRAYLANG['TXT_DOWNLOADS_PERMISSIONS'],
            'TXT_SAVE' => $_ARRAYLANG['TXT_SAVE'],
            'TXT_SEARCH' => $_ARRAYLANG['TXT_SEARCH'],
            'TXT_DOWNLOADS_CATEGORIES' => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORIES'],
            'TXT_DOWNLOADS_CATEGORY' => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORY'],
            'TXT_DOWNLOADS_ADDED_CATEGORIES' => $_ARRAYLANG['TXT_DOWNLOADS_ADDED_CATEGORIES'],
            'TXT_DOWNLOADS_FILES' => $_ARRAYLANG['TXT_DOWNLOADS_FILES'],
            'TXT_DOWNLOADS_STATUS' => $_ARRAYLANG['TXT_DOWNLOADS_STATUS'],
            'TXT_DOWNLOADS_TYPE' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE'],
            'TXT_FUNCTIONS' => $_ARRAYLANG['TXT_FUNCTIONS'],
            'TXT_MARKED' => $_ARRAYLANG['TXT_MARKED'],
            'TXT_SELECT_ALL' => $_ARRAYLANG['TXT_SELECT_ALL'],
            'TXT_REMOVE_SELECTION' => $_ARRAYLANG['TXT_REMOVE_SELECTION'],
            'TXT_SELECT_ACTION' => $_ARRAYLANG['TXT_SELECT_ACTION'],
            'TXT_DELETE' => $_ARRAYLANG['TXT_DELETE'],
            'TXT_CONFIRM_DELETE' => $_ARRAYLANG['TXT_CONFIRM_DELETE'],
            'TXT_ACTION_IS_IRREVERSIBLE' => $_ARRAYLANG['TXT_ACTION_IS_IRREVERSIBLE'],
            'TXT_DOWNLOADS_TYPE_IMAGE' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_IMAGE'],
            'TXT_DOWNLOADS_TYPE_TEXT' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_TEXT'],
            'TXT_DOWNLOADS_TYPE_MEDIA' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_MEDIA'],
            'TXT_DOWNLOADS_TYPE_ARCHIVE' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_ARCHIVE'],
            'TXT_DOWNLOADS_TYPE_APPLICATION'=> $_ARRAYLANG['TXT_DOWNLOADS_TYPE_APPLICATION'],
            'TXT_DOWNLOADS_FILEINFO' => $_ARRAYLANG['TXT_DOWNLOADS_FILEINFO'],
            'TXT_DOWNLOADS_SIZE' => $_ARRAYLANG['TXT_DOWNLOADS_SIZE'],
            'TXT_DOWNLOADS_LICENSE' => $_ARRAYLANG['TXT_DOWNLOADS_LICENSE'],
            'TXT_DOWNLOADS_VERSION' => $_ARRAYLANG['TXT_DOWNLOADS_VERSION'],
            'TXT_DOWNLOADS_TYPE_UNDEFINED' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_UNDEFINED'],
            'TXT_DOWNLOADS_RELATED_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_RELATED_DOWNLOADS'],
            'TXT_DOWNLOADS_PROTECTED_DOWNLOAD' => $_ARRAYLANG['TXT_DOWNLOADS_PROTECTED_DOWNLOAD'],
            'TXT_DOWNLOADS_YES' => $_ARRAYLANG['TXT_DOWNLOADS_YES'],
            'TXT_DOWNLOADS_NO' => $_ARRAYLANG['TXT_DOWNLOADS_NO'],
            'DOWNLOAD_ID' => $download_id,
            'RADIO_FILE_1' => $RadioFile_1,
            'RADIO_FILE_2' => $RadioFile_2,
            'DOWNLOAD_FILENAME' => $DownloadInfo["file_name"],
            'DOWNLOAD_URL' => $DownloadInfo["file_url"],
            'LANG_TABS' => $languageTabsSource,
            'LANG_TAB_NAVI' => $languageTabsNavi,
            'DOWNLOAD_TYPE_SELECTED_1' => $TypeSelected_1,
            'DOWNLOAD_TYPE_SELECTED_2' => $TypeSelected_2,
            'DOWNLOAD_TYPE_SELECTED_3' => $TypeSelected_3,
            'DOWNLOAD_TYPE_SELECTED_4' => $TypeSelected_4,
            'DOWNLOAD_FILE_SIZE' => $DownloadInfo["file_size"],
            'DOWNLOAD_FILE_LICENSE' => $DownloadInfo["file_license"],
            'DOWNLOAD_FILE_VERSION' => $DownloadInfo["file_version"],
            'DOWNLOAD_FILE_AUTOR' => $DownloadInfo["file_autor"],
            'DOWNLOAD_FILE_IMG' => $DownloadInfo["file_img"],
            'VALUE_CATEGORIES' => $ValueCategories,
            'VALUE_ADDED_CATEGORIES' => $ValueAddedCategories,
            'DOWNLOAD_FILE_PROTECTED_YES' => $protected_yes,
            'DOWNLOAD_FILE_PROTECTED_NO' => $protected_no,
            'VALUE_GROUPS' => $valueGroups,
            'VALUE_ADDED_GROUPS' => $valueAddedGroups,
            'VALUE_DOWNLOADS' => $ValueDownloads,
            'VALUE_ADDED_DOWNLOADS' => $ValueAddedDownloads,
            'JS_FILESWITCH' => $js_fileswitch,
            'JS_GROUPSELECT' => $js_groupselect,
            'TXT_DOWNLOADS_AVAILABLE_USER_GROUPS' => $_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_USER_GROUPS'],
            'TXT_DOWNLOADS_ASSIGNED_USER_GROUPS' => $_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_USER_GROUPS'],
            'TXT_DOWNLOADS_SOURCE' => $_ARRAYLANG['TXT_DOWNLOADS_SOURCE'],
            'TXT_DOWNLOADS_AVAILABLE_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_DOWNLOADS'],
            'TXT_DOWNLOADS_ASSIGNED_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_DOWNLOADS'],
            'STATE_CHECKED' => $state_checked,
        ));
    }


    /**
     * files
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
     */
    function _files()
    {
        global $_ARRAYLANG, $objDatabase;

        $this->_pageTitle = $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_DOWNLOADS'];
        $this->_objTpl->loadTemplateFile('files.html');

        if ($_REQUEST["deletefiles"]=="exe") {
            $Deleted = true;
            for($i=0; $i<=count($_REQUEST["selectedFileId"]); $i++) {
                if (intval($_REQUEST["selectedFileId"][$i])>0) {
                    if (!$this->_DeleteDownload(intval($_REQUEST["selectedFileId"][$i]))) {
                        $Deleted = false;
                    }
                }
            }
            if ($Deleted) {
                $this->arrStatusMsg['ok'][] = $_ARRAYLANG['TXT_DOWNLOADS_DELETE_SUCCESSFULL'];
            } else {
                $this->arrStatusMsg['error'][] = $_ARRAYLANG['TXT_DOWNLOADS_DELETE_FAILED'];
            }
        }

        if (isset($_REQUEST["mode"])) {

            // INSERT
            // ---------------------------------
            if ($_REQUEST["mode"] == "insert") {
                $InserFile = $this->InsertFile();
                if ($InserFile) {
                    $this->arrStatusMsg['ok'][] = $_ARRAYLANG['TXT_DOWNLOADS_ADD_SUCCESSFULL'];
                } else {
                    $this->arrStatusMsg['error'][] = $_ARRAYLANG['TXT_DOWNLOADS_ADD_FAILED'];
                }
            }

            // UPDATE
            // ---------------------------------
            if ($_REQUEST["mode"] == "update") {
                $UpdateDownload = $this->UpdateDownload();
                if ($UpdateDownload) {
                    $this->arrStatusMsg['ok'][] = $_ARRAYLANG['TXT_DOWNLOADS_UPDATE_SUCCESSFULL'];
                } else {
                    $this->arrStatusMsg['error'][] = $_ARRAYLANG['TXT_DOWNLOADS_UPDATE_FAILED'];
                }
            }

            // DELETE
            // ---------------------------------
            if ($_REQUEST["mode"] == "delete") {
                if (intval($_REQUEST["download"])>0) {
                    if ($this->_DeleteDownload(intval($_REQUEST["download"]))) {
                        $this->arrStatusMsg['ok'][] = $_ARRAYLANG['TXT_DOWNLOADS_DELETE_SUCCESSFULL'];
                    } else {
                        $this->arrStatusMsg['error'][] = $_ARRAYLANG['TXT_DOWNLOADS_DELETE_FAILED'];
                    }
                }
            }
        }

        $checkboxesSource = '';
        $languageTabsSource = '';
        $languageTabsNavi = '';
        $fieldsArray = array();
        $LiClass = 'active';
        $StyleDisplay = 'block';
        $LangSelectValue = '';
        foreach ($this->_arrLang as $langId => $LangInfo) {
            $fieldsArray = array('file_name_'.$langId => array('name' => $_ARRAYLANG['TXT_NAME'], 'value' => '', 'rte' => 0), 'file_desc_'.$langId => array('name' => $_ARRAYLANG['TXT_DESCRIPTION'], 'value' => '', 'rte' => 2));
            $languageTabsSource .= $this->_LangTabHTML($LangInfo['name'], 'display: '.$StyleDisplay.';', $LangInfo['name'], $fieldsArray);
            $languageTabsNavi .= '<li><a id="addEntry_'.$LangInfo['name'].'" class="'.$LiClass.'" href="javascript:{}" onclick="selectTab(\''.$LangInfo['name'].'\')" title="'.$LangInfo['name'].'" style="display: inline;">'.$LangInfo['name'].'</a></li>';
            $checkboxesSource .= '<td><input checked="checked" name="frmEditEntry_Languages[]" value="'.$langId.'" onclick="switchBoxAndTab(this, \'addEntry_'.$LangInfo['name'].'\');" type="checkbox" />'.$LangInfo['name'].' ['.$LangInfo['lang'].']</td>';
            $LiClass = 'inactive';
            $StyleDisplay = 'none';
// TODO: Never used
//            $js_arr .= 'arrTabToDiv["addEntry_'.$LangInfo['name'].'"] = "'.$LangInfo['name'].'"; ';

            $LangSelectValue .= '<option value="'.$langId.'">'.$LangInfo['name'].'</option>';

        }
        $languageTabsNavi = '<ul id="tabmenu">'.$languageTabsNavi.'</ul>';
        $GroupsSelect = $this->_permissionsSelect('AddFileForm');

        $ValueCategories = '';

        $query = "
            SELECT category_id
            FROM ".DBPREFIX."module_downloads_categories
            ORDER BY category_order";
        $objResult = $objDatabase->Execute($query);

        if ($objResult) {
            while (!$objResult->EOF) {
                $CategoryInfo = $this->_CategoryInfo($objResult->fields["category_id"]);

                if (intval($_REQUEST["category"])==$objResult->fields["category_id"]) {
                    $selectedtext = 'selected';
                } else {
                    $selectedtext = '';
                }

                $ValueCategories .= '<option value="'.$objResult->fields["category_id"].'" '.$selectedtext.'>'.$CategoryInfo['category_loc'][0]['name'].'</option>\n';
                $objResult->MoveNext();
            }
        }

        $CategoriesSelect = '<select name="category" style="width: 300px;">';
        $CategoriesSelect .= '<option value=""> --- '.$_ARRAYLANG['TXT_DOWNLOADS_CATEGORY'].' --- </option>';
        $CategoriesSelect .= $ValueCategories;
        $CategoriesSelect .= '</select>';

        $LangSelect = '<select name="lang" style="width: 300px;">';
        $LangSelect .= '<option value=""> --- '.$_ARRAYLANG['TXT_DOWNLOADS_LANGUAGE'].' --- </option>';
        $LangSelect .= $LangSelectValue;
        $LangSelect .= '</select>';

        // Files list
        // ---------------------------------
        if (intval($_REQUEST["category"])>0) {
            $query = "
                SELECT rel_file, rel_category, file_id, file_name
                FROM ".DBPREFIX."module_downloads_rel_files_cat
                JOIN ".DBPREFIX."module_downloads_files ON ".DBPREFIX."module_downloads_rel_files_cat.rel_file=".DBPREFIX."module_downloads_files.file_id
                WHERE rel_category=".intval($_REQUEST["category"])."
                ORDER BY file_name";
        } else {
            $query = "
                SELECT file_id, file_name, rel_file
                FROM ".DBPREFIX."module_downloads_files
                LEFT JOIN ".DBPREFIX."module_downloads_rel_files_cat ON ".DBPREFIX."module_downloads_files.file_id=".DBPREFIX."module_downloads_rel_files_cat.rel_file
                WHERE rel_file is NULL
                ORDER BY file_name";
        }

        $objResult = $objDatabase->Execute($query);
        $ValueDownloads = '';
        if ($objResult) {
            $this->_objTpl->setCurrentBlock('filesList');
            $i = 0;
            while (!$objResult->EOF) {

                $fileInfo = $this->_FileInfo($objResult->fields["file_id"]);

                $ValueDownloads .= '<option value="'.$fileInfo["file_id"].'">'.$fileInfo["file_loc"][0]["name"].' ('.$fileInfo["file_name"].')</option>';

                $fileName = $fileInfo["file_name"];
                if ($fileInfo["file_name"]=="") {
                    $fileName = $fileInfo["file_url"];
                }

                if ($fileInfo["file_state"]==1) {
                    $file_state = '<img src="/cadmin/images/icons/status_green.gif" border="0" alt="'.$_ARRAYLANG['TXT_DOWNLOADS_STATUS'].'" />';
                } else {
                    $file_state = '<img src="/cadmin/images/icons/status_red.gif" border="0" alt="'.$_ARRAYLANG['TXT_DOWNLOADS_STATUS'].'" />';
                }

                $this->_objTpl->setVariable(array(
                        'ROWCLASS' =>($i % 2) ? 'row1' : 'row2',
                        'FILE_ID' => $fileInfo["file_id"],
                        'FILE_NAME' => $fileInfo["file_loc"][0]["name"]."",
                        'FILE_TYPE' => $fileInfo["file_type"],
                        'FILE_AUTOR' => $fileInfo["file_autor"],
                        'FILE_SOURCE' => $fileName,
                        'FILE_STATE' => $file_state,
                ));
                $this->_objTpl->parse('filesList');
                $i++;
                $objResult->MoveNext();
            }
        }

        // Value Downloads
        // ---------------------------------
         $ValueDownloads = '';
         $query = "
                SELECT file_id, file_name
                FROM ".DBPREFIX."module_downloads_files WHERE file_state=1
                ORDER BY file_name, file_type";
        $objResult = $objDatabase->Execute($query);
         if ($objResult) {
             while (!$objResult->EOF) {
                 $fileInfo = $this->_FileInfo($objResult->fields["file_id"]);
                 $ValueDownloads .= '<option value="'.$fileInfo["file_id"].'">'.$fileInfo["file_loc"][0]["name"].'</option>';
                 $objResult->MoveNext();
             }
         }

        // Frontend Groups
        $valueGroups = '';
        //$arrAssignedFrontendGroups=$this->_getAssignedGroups($groupType="frontend",$pageId);
        $objFWUser = FWUser::getFWUserObject();
        $objGroup = $objFWUser->objGroup->getGroups(array('type' => 'frontend'));
        while (!$objGroup->EOF) {
            $valueGroups.="<option value=\"".$objGroup->getId()."\">".htmlentities($objGroup->getName(), ENT_QUOTES, CONTREXX_CHARSET)."</option>\n";
            $objGroup->next();
        }

        $this->_objTpl->setVariable(array(
            'TXT_MANAGE_FILES' => $_ARRAYLANG['TXT_MANAGE_FILES'],
            'TXT_ADD_FILE' => $_ARRAYLANG['TXT_ADD_FILE'],
            'TXT_DOWNLOADS_MANAGE_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_MANAGE_DOWNLOADS'],
            'TXT_DOWNLOADS_ADD_DOWNLOAD' => $_ARRAYLANG['TXT_DOWNLOADS_ADD_DOWNLOAD'],
            'TXT_AUTHOR' => $_ARRAYLANG['TXT_DOWNLOADS_AUTHOR'],
            'TXT_DOWNLOADS_FILE' => $_ARRAYLANG['TXT_DOWNLOADS_FILE'],
            'TXT_IMAGE' => $_ARRAYLANG['TXT_IMAGE'],
            'TXT_BROWSE' => $_ARRAYLANG['TXT_BROWSE'],
            'TXT_LANGUAGES' => $_ARRAYLANG['TXT_LANGUAGES'],
            'TXT_DOWNLOADS_PERMISSIONS' => $_ARRAYLANG['TXT_DOWNLOADS_PERMISSIONS'],
            'TXT_SAVE' => $_ARRAYLANG['TXT_SAVE'],
            'TXT_SEARCH' => $_ARRAYLANG['TXT_SEARCH'],
            'TXT_DOWNLOADS_CATEGORIES' => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORIES'],
            'TXT_DOWNLOADS_CATEGORY' => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORY'],
            'TXT_DOWNLOADS_ADDED_CATEGORIES' => $_ARRAYLANG['TXT_DOWNLOADS_ADDED_CATEGORIES'],
            'TXT_DOWNLOADS_FILES' => $_ARRAYLANG['TXT_DOWNLOADS_FILES'],
            'TXT_DOWNLOADS_STATUS' => $_ARRAYLANG['TXT_DOWNLOADS_STATUS'],
            'TXT_DOWNLOADS_TYPE' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE'],
            'TXT_FUNCTIONS' => $_ARRAYLANG['TXT_FUNCTIONS'],
            'TXT_MARKED' => $_ARRAYLANG['TXT_MARKED'],
            'TXT_SELECT_ALL' => $_ARRAYLANG['TXT_SELECT_ALL'],
            'TXT_REMOVE_SELECTION' => $_ARRAYLANG['TXT_REMOVE_SELECTION'],
            'TXT_SELECT_ACTION' => $_ARRAYLANG['TXT_SELECT_ACTION'],
            'TXT_DELETE' => $_ARRAYLANG['TXT_DELETE'],
            'TXT_CONFIRM_DELETE' => $_ARRAYLANG['TXT_CONFIRM_DELETE'],
            'TXT_ACTION_IS_IRREVERSIBLE'=> $_ARRAYLANG['TXT_ACTION_IS_IRREVERSIBLE'],
            'TXT_DOWNLOADS_TYPE_IMAGE' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_IMAGE'],
            'TXT_DOWNLOADS_TYPE_TEXT' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_TEXT'],
            'TXT_DOWNLOADS_TYPE_MEDIA' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_MEDIA'],
            'TXT_DOWNLOADS_TYPE_ARCHIVE'=> $_ARRAYLANG['TXT_DOWNLOADS_TYPE_ARCHIVE'],
            'TXT_DOWNLOADS_TYPE_APPLICATION'=> $_ARRAYLANG['TXT_DOWNLOADS_TYPE_APPLICATION'],
            'TXT_DOWNLOADS_FILEINFO' => $_ARRAYLANG['TXT_DOWNLOADS_FILEINFO'],
            'TXT_DOWNLOADS_SIZE' => $_ARRAYLANG['TXT_DOWNLOADS_SIZE'],
            'TXT_DOWNLOADS_LICENSE' => $_ARRAYLANG['TXT_DOWNLOADS_LICENSE'],
            'TXT_DOWNLOADS_VERSION' => $_ARRAYLANG['TXT_DOWNLOADS_VERSION'],
            'TXT_DOWNLOADS_TYPE_UNDEFINED' => $_ARRAYLANG['TXT_DOWNLOADS_TYPE_UNDEFINED'],
            'TXT_DOWNLOADS_RELATED_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_RELATED_DOWNLOADS'],
            'TXT_DOWNLOADS_PROTECTED_DOWNLOAD' => $_ARRAYLANG['TXT_DOWNLOADS_PROTECTED_DOWNLOAD'],
            'TXT_DOWNLOADS_YES' => $_ARRAYLANG['TXT_DOWNLOADS_YES'],
            'TXT_DOWNLOADS_NO' => $_ARRAYLANG['TXT_DOWNLOADS_NO'],
            'LANG_SELECT' => $checkboxesSource,
            'LANG_TABS' => $languageTabsSource,
            'LANG_TAB_NAVI' => $languageTabsNavi,
            'GROUP_SELECT' => $GroupsSelect,
            'VALUE_CATEGORIES' => $ValueCategories,
// TODO: Undefined
//            'VALUE_ADDED_CATEGORIES' => $ValueAddedCategories,
            'CATEGORY_SELECT' => $CategoriesSelect,
            'LANGUAGE_SELECT' => $LangSelect,
            'VALUE_DOWNLOADS' => $ValueDownloads,
            'VALUE_GROUPS' => $valueGroups,
            'VALUE_ADDED_GROUPS' => '',
            'VALUE_USER' => $_SESSION['auth']['username'],
            'TXT_DOWNLOADS_AVAILABLE_USER_GROUPS' => $_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_USER_GROUPS'],
            'TXT_DOWNLOADS_ASSIGNED_USER_GROUPS' => $_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_USER_GROUPS'],
            'TXT_DOWNLOADS_SOURCE' => $_ARRAYLANG['TXT_DOWNLOADS_SOURCE'],
            'TXT_DOWNLOADS_AVAILABLE_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_AVAILABLE_DOWNLOADS'],
            'TXT_DOWNLOADS_ASSIGNED_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_ASSIGNED_DOWNLOADS'],
            'TXT_DOWNLOADS_STATUS' => $_ARRAYLANG['TXT_DOWNLOADS_STATUS'],
        ));
    }


    /**
     * categories list
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
     */
    private function categories()
    {
        global $_ARRAYLANG, $_LANGID;

        // TODO: add to lang repository
        $_ARRAYLANG['TXT_DOWNLOADS_SHOW_CATEGORY_CONTENT'] = 'Inhalt der Kategorie %s zeigen...';
        $_ARRAYLANG['TXT_DOWNLOADS_DEACTIVATE_CATEGORY_DESC'] = 'Klicken Sie hier, um diese Kategorie zu deaktivieren.';
        $_ARRAYLANG['TXT_DOWNLOADS_ACTIVATE_CATEGORY_DESC'] = 'Klicken Sie hier, um diese Kategorie zu aktivieren.';
        $_ARRAYLANG['TXT_DOWNLOADS_OVERVIEW'] = 'Übersicht';
        // TXT_DOWNLOADS_ACTIVE
        // TXT_DOWNLOADS_INACTIVE
        // TXT_DOWNLOADS_UNKNOWN



        // TODO: clean up
        $this->_pageTitle = $_ARRAYLANG['TXT_DOWNLOADS_OVERVIEW'];
        $this->_objTpl->loadTemplateFile('module_downloads_categories.html');


        $parentCategoryId = isset($_REQUEST["parent_id"]) ? intval($_REQUEST["parent_id"]) : 0;
        $filter = array();


        $objCategory = Category::getCategory($parentCategoryId);
        $objSubcategory = Category::getCategories(array('parent_id' => $objCategory->getId()));

        // TODO: clean up
        $this->_objTpl->setVariable(array(
            'TXT_DOWNLOADS_ORDER'                   => $_ARRAYLANG['TXT_DOWNLOADS_ORDER'],
            'TXT_DOWNLOADS_STATUS'                  => $_ARRAYLANG['TXT_DOWNLOADS_STATUS'],
            'TXT_DOWNLOADS_ID'                      => $_ARRAYLANG['TXT_DOWNLOADS_ID'],
            'TXT_DOWNLOADS_NAME'                    => $_ARRAYLANG['TXT_DOWNLOADS_NAME'],
            'TXT_DOWNLOADS_DESCRIPTION'             => $_ARRAYLANG['TXT_DOWNLOADS_DESCRIPTION'],
            'TXT_DOWNLOADS_AUTHOR'                  => $_ARRAYLANG['TXT_DOWNLOADS_AUTHOR'],
            'TXT_DOWNLOADS_FUNCTIONS'               => $_ARRAYLANG['TXT_DOWNLOADS_FUNCTIONS'],
            'TXT_DOWNLOADS_OPERATION_IRREVERSIBLE'  => $_ARRAYLANG['TXT_DOWNLOADS_OPERATION_IRREVERSIBLE'],
            'DOWNLOADS_CONFIRM_DELETE_CATEGORY_TXT' => preg_replace('#\n#', '\\n', addslashes($_ARRAYLANG['TXT_DOWNLOADS_CONFIRM_DELETE_CATEGORY'])),

            // rename
            'TXT_MANAGE_CATEGORIES' => $_ARRAYLANG['TXT_MANAGE_CATEGORIES'],
            'TXT_ADD_CATEGORY' => $_ARRAYLANG['TXT_ADD_CATEGORY'],
        ));




        $this->_objTpl->setGlobalVariable(array(
            'TXT_DOWNLOADS_EDIT'    => $_ARRAYLANG['TXT_DOWNLOADS_EDIT'],
            'TXT_DOWNLOADS_DELETE'  => $_ARRAYLANG['TXT_DOWNLOADS_DELETE']
        ));

        while (!$objSubcategory->EOF) {




            if (Permission::checkAccess(142, 'static', true)) {
                // managers are allowed to switch the active status of a category
                $this->_objTpl->setVariable(array(
                    'DOWNLOADS_CATEGORY_ID'                  => $objSubcategory->getId(),
                    'DOWNLOADS_CATEGORY_PARENT_ID'           => $objCategory->getId(),
                    //'DOWNLOADS_CATEGORY_STATUS_JS'           => $objSubcategory->getActiveStatus(),
                    //'DOWNLOADS_CATEGORY_NAME_JS'             => htmlspecialchars($objSubcategory->getName($_LANGID), ENT_QUOTES, CONTREXX_CHARSET),
                    'DOWNLOADS_CATEGORY_SWITCH_STATUS_DESC'  => $objSubcategory->getActiveStatus() ? $_ARRAYLANG['TXT_DOWNLOADS_DEACTIVATE_CATEGORY_DESC'] : $_ARRAYLANG['TXT_DOWNLOADS_ACTIVATE_CATEGORY_DESC']
                ));
                $this->_objTpl->parse('downloads_category_status_link_open');
                $this->_objTpl->parse('downloads_category_status_link_close');


                $this->_objTpl->setVariable('DOWNLOADS_CATEGORY_NAME_JS', htmlspecialchars($objSubcategory->getName($_LANGID), ENT_QUOTES, CONTREXX_CHARSET));
                $this->_objTpl->parse('downloads_category_function_list');
            } else {
                $this->_objTpl->setVariable(
                    'DOWNLOADS_CATEGORY_SWITCH_STATUS_DESC',
                    $objSubcategory->getActiveStatus() ? $_ARRAYLANG['TXT_DOWNLOADS_ACTIVE'] : $_ARRAYLANG['TXT_DOWNLOADS_INACTIVE']
                );
                $this->_objTpl->hideBlock('downloads_category_status_link_open');
                $this->_objTpl->hideBlock('downloads_category_status_link_close');

                $this->_objTpl->hideBlock('downloads_category_function_list');
            }

            //parse select checkbox
            // TODO: check manage subcategories access
            //var_dump($objCategory->getManageSubcategoriesAccessId());
            if (Permission::checkAccess(142, 'static', true) || Permission::checkAccess($objCategory->getManageSubcategoriesAccessId(), 'dynamic', true)) {
                $this->_objTpl->setVariable('DOWNLOADS_CATEGORY_ID', $objSubcategory->getId());
                $this->_objTpl->parse('downloads_category_checkbox');
            } else {
                $this->_objTpl->hideBlock('downloads_category_checkbox');
            }

            // parse detail link
            if (Permission::checkAccess(142, 'static', true) || Permission::checkAccess($objSubcategory->getReadAccessId(), 'dynamic', true)) {
                $this->_objTpl->setVariable('DOWNLOADS_CATEGORY_ID', $objSubcategory->getId());
                $this->_objTpl->parse('downloads_category_name_link_open');
                $this->_objTpl->touchBlock('downloads_category_name_link_close');
            } else {
                $this->_objTpl->hideBlock('downloads_category_name_link_open');
                $this->_objTpl->hideBlock('downloads_category_name_link_close');
            }


            $description = htmlentities($objSubcategory->getDescription($_LANGID), ENT_QUOTES, CONTREXX_CHARSET);
            if (strlen($description) > 200) {
                $description = substr($description, 0, 197).'...';
            }

            $this->_objTpl->setVariable(array(
                'DOWNLOADS_CATEGORY_ROW_CLASS'      => 1,
                'DOWNLOADS_CATEGORY_ID'             => $objSubcategory->getId(),
                'DOWNLOADS_CATEGORY_ORDER'          => $objSubcategory->getOrder(),
                'DOWNLOADS_CATEGORY_STATUS_LED'     => $objSubcategory->getActiveStatus() ? 'led_green.gif' : 'led_red.gif',
                'DOWNLOADS_OPEN_CATEGORY_DESC'      => sprintf($_ARRAYLANG['TXT_DOWNLOADS_SHOW_CATEGORY_CONTENT'], htmlentities($objSubcategory->getName($_LANGID), ENT_QUOTES, CONTREXX_CHARSET)),
                'DOWNLOADS_CATEGORY_NAME'           => htmlentities($objSubcategory->getName($_LANGID), ENT_QUOTES, CONTREXX_CHARSET),
                'DOWNLOADS_CATEGORY_DESCRIPTION'    => $description,
                'DOWNLOADS_CATEGORY_AUTHOR'         => $this->getParsedUsername($objSubcategory->getOwnerId())
            ));

            $this->_objTpl->parse('downloads_category_list');



            $objSubcategory->next();
        }

        // parse category id (will be used as the parent_id when creating a new directory
        $this->_objTpl->setVariable('DOWNLOADS_CATEGORY_ID', $objCategory->getId());

        // TODO: clean up
        $this->_objTpl->setVariable(array(
            'TXT_DOWNLOADS_SELECT_ACTION'   => $_ARRAYLANG['TXT_DOWNLOADS_SELECT_ACTION'],
            'TXT_DOWNLOADS_DELETE'          => $_ARRAYLANG['TXT_DOWNLOADS_DELETE'],
            //'TXT_DOWNLOADS_ORDER'           => $_ARRAYLANG['TXT_DOWNLOADS_ORDER'],
            'TXT_DOWNLOADS_CHECK_ALL'       => $_ARRAYLANG['TXT_DOWNLOADS_CHECK_ALL'],
            'TXT_DOWNLOADS_UNCHECK_ALL'     => $_ARRAYLANG['TXT_DOWNLOADS_UNCHECK_ALL'],
        ));



        // TODO: Add file list

        /*
        // -----------------------------------------
        // checkboxes & languagetabs 4 languages
        // -----------------------------------------
        $checkboxesSource = '';
        $languageTabsNavi = '';
        $languageTabsSource = '';
        $js_arr = '';
        $fieldsArray = array();
        $LiClass = 'active';
        $StyleDisplay = 'block';
        foreach ($this->_arrLang as $langId => $LangInfo) {
            if ($category == 0) {
                $checkboxesSource .= '<td><input checked="checked" name="frmEditEntry_Languages[]" value="'.$langId.'" onclick="switchBoxAndTab(this, \'addEntry_'.$LangInfo['name'].'\');" type="checkbox" />'.$LangInfo['name'].' ['.$LangInfo['lang'].']</td>';
                $fieldsArray = array('category_name_'.$langId => array('name' => $_ARRAYLANG['TXT_NAME'], 'value' => '', 'rte' => 0), 'category_desc_'.$langId => array('name' => $_ARRAYLANG['TXT_DESCRIPTION'], 'value' => '', 'rte' => 2));
            } else {
                // mode==update
                if ($this->_CatLang($category, $langId)) {
                    $checked = ' checked="checked"';
                } else {
                    $checked = '';
                }
                //$checkboxesSource .= '<td><input'.$checked.' name="frmEditEntry_Languages[]" value="'.$langId.'" onclick="switchBoxAndTab(this, \'addEntry_'.$LangInfo['name'].'\');" type="checkbox" />'.$LangInfo['name'].' ['.$LangInfo['lang'].']</td>';
                $checkboxesSource .= '<td><input checked="checked" name="frmEditEntry_Languages[]" value="'.$langId.'" onclick="switchBoxAndTab(this, \'addEntry_'.$LangInfo['name'].'\');" type="checkbox" />'.$LangInfo['name'].' ['.$LangInfo['lang'].']</td>';

            }
            $languageTabsNavi .= '<li><a id="addEntry_'.$LangInfo['name'].'" class="'.$LiClass.'" href="javascript:{}" onclick="selectTab(\''.$LangInfo['name'].'\')" title="'.$LangInfo['name'].'" style="display: inline;">'.$LangInfo['name'].'</a></li>';
            $LiClass = 'inactive';
            $languageTabsSource .= $this->_LangTabHTML($LangInfo['name'], 'display: '.$StyleDisplay.';', $LangInfo['name'], $fieldsArray);
            $StyleDisplay = 'none';
            $js_arr .= 'arrTabToDiv["addEntry_'.$LangInfo['name'].'"] = "'.$LangInfo['name'].'"; ';
        }
        $languageTabsNavi = '<ul id="tabmenu">'.$languageTabsNavi.'</ul>';

        // --------------------------------------------
        // Users / Dropdown-Select
        // --------------------------------------------

//        $objFWUser = new FWUser();
//        $objFWUser->objGroup->loadGroups($filter = null, $arrSort = null, $arrAttributes = null, $limit = null, $offset = null);
//        while (!$objFWUser->objGroup->EOF) {
//            $GroupsSelect .= '';
//
//            $groupId = $objFWUser->objGroup->getId();
//            $groupName = $objFWUser->objGroup->getName();
//
//            $objFWUser->objGroup->next();
//        }


        $GroupsSelect = $this->_permissionsSelect('AddCategory');

        $this->_objTpl->setVariable(array(
            'TXT_LANGUAGES' => $_ARRAYLANG['TXT_LANGUAGES'],
            'TXT_IMAGE' => $_ARRAYLANG['TXT_IMAGE'],
            'TXT_BROWSE' => $_ARRAYLANG['TXT_BROWSE'],
            'TXT_SAVE' => $_ARRAYLANG['TXT_SAVE'],
            'TXT_AUTHOR' => $_ARRAYLANG['TXT_DOWNLOADS_AUTHOR'],
            'TXT_DOWNLOADS_PERMISSIONS' => $_ARRAYLANG['TXT_DOWNLOADS_PERMISSIONS'],
            'TXT_CONFIRM_DELETE' => $_ARRAYLANG['TXT_CONFIRM_DELETE'],
            'TXT_ACTION_IS_IRREVERSIBLE'=> $_ARRAYLANG['TXT_ACTION_IS_IRREVERSIBLE'],
            'GROUP_SELECT' => $GroupsSelect,
            'LANG_SELECT' => $checkboxesSource,
            'LANG_TABS' => $languageTabsSource,
            'LANG_TAB_NAVI' => $languageTabsNavi,
            'JS_ARR' => $js_arr,
            'VALUE_USER' => $_SESSION['auth']['username'],
        ));


*/
    }

    /**
     * add new file
     *
     * @global object $objDatabase
     * @global array $_CONFIG
     */
    function InsertFile()
    {
        global $objDatabase, $_CONFIG;

        if ($_REQUEST["file_select"]=="1") {
            if ($_REQUEST["file_source"]!='') {
                $FileName = addslashes(strip_tags($_REQUEST["file_source"]));
            }
        } elseif ($_REQUEST["file_select"]=="2") {
            if ($_REQUEST["file_url"]!='') {
                $FileName = addslashes(strip_tags($_REQUEST["file_url"]));
                if (substr($FileName, 0, 7)!='http://' && substr($FileName, 0, 8)!='https://') {
                    $FileName = 'http://'.$FileName;
                }
            }
        }

        $FileType = addslashes(strip_tags($_REQUEST["file_type"]));
        $FileSize = addslashes(strip_tags($_REQUEST["file_size"]));
        $FileLicense = addslashes(strip_tags($_REQUEST["file_license"]));
        $FileVersion = addslashes(strip_tags($_REQUEST["file_version"]));
        $FileAuthor = addslashes(strip_tags($_REQUEST["file_author"]));
        $FileImage = addslashes(strip_tags($_POST['file_image']));
        $FileAccessID = $_CONFIG['lastAccessId']+1;

        srand(microtime()*100000000);
        $zufall = rand(1000000,9999999);
        $SourceName = md5($zufall.$FileName);

        if ($_REQUEST["protected"]=="1") {
            $FileProtected = 1;
        } else {
            $FileProtected = 0;
        }

        if ($_REQUEST["file_state"]=="1") {
            $file_state = 1;
        } else {
            $file_state = 0;
        }


        // File
        // -----------------------------------------------------------------
        $query = "
            INSERT INTO ".DBPREFIX."module_downloads_files
            (`file_name`, `file_type`, `file_size`, `file_img`, `file_autor`, `file_created`, `file_source`, `file_protected`, `file_access_id`, `file_license`, `file_version`, `file_state`) VALUES
            ('".$FileName."', '".$FileType."', '".$FileSize."', '".$FileImage."', '".$FileAuthor."', now(), '".$SourceName."', '".$FileProtected."', '".$FileAccessID."', '".$FileLicense."', '".$FileVersion."', '".$file_state."')
        ";

        $objDatabase->Execute($query);

        $objDatabase->Execute("UPDATE ".DBPREFIX."settings SET setvalue=".$FileAccessID." WHERE setname='lastAccessId'");
        require_once(ASCMS_CORE_PATH.'/settings.class.php');
        $objSettings = new settingsManager();
        $objSettings->writeSettingsFile();

        $FileId = $objDatabase->Insert_Id();

        // Categories
        // -----------------------------------------------------------------
        for($i=0; $i<=count($_REQUEST["assignedCategories"]); $i++) {
            if (intval($_REQUEST["assignedCategories"][$i])>0) {
                $query = "
                        INSERT INTO ".DBPREFIX."module_downloads_rel_files_cat
                            (`rel_file`, `rel_category`) VALUES
                            ('".$FileId."', '".$_REQUEST["assignedCategories"][$i]."')
                ";
                $objDatabase->Execute($query);
            }
        }

        // Name & Description
        // -----------------------------------------------------------------
        //for($i=0; $i<=count($_REQUEST["frmEditEntry_Languages"]); $i++) {
        foreach (array_keys($this->_arrLang) as $langId) {
            //$langId = $_REQUEST["frmEditEntry_Languages"][$i];
            if (intval($langId)>0) {
                // insert lang
                // ------------------------------------------------
                $query = "INSERT INTO ".DBPREFIX."module_downloads_files_lang
                            SET file='".$FileId."',
                            language='".$langId."'";
                $objDatabase->Execute($query);

                // insert loclaes
                // ------------------------------------------------
                $query = "INSERT INTO ".DBPREFIX."module_downloads_files_locales
                            SET loc_lang='".$langId."',
                            loc_file='".$FileId."',
                            loc_name='".addslashes(strip_tags($_POST['file_name_'.$langId]))."',
                            loc_desc='".addslashes(strip_tags($_POST['file_desc_'.$langId]))."'";
                $objDatabase->Execute($query);
            }
        }

        // Access ID
        // -----------------------------------------------------------------
        if ($FileProtected==1) {
            for($i=0; $i<=count($_REQUEST["assignedGroups"]); $i++) {
                if (intval($_REQUEST["assignedGroups"][$i])>0) {
                    $objDatabase->Execute("INSERT INTO ".DBPREFIX."access_group_dynamic_ids
                    (`access_id`,`group_id`) VALUES
                    (".$FileAccessID.", ".intval($_REQUEST["assignedGroups"][$i]).")");
                }
            }
        }

        // Related downloads
        // -----------------------------------------------------------------
        for($i=0; $i<=count($_REQUEST["assignedDownloads"]); $i++) {
            if (intval($_REQUEST["assignedDownloads"][$i])>0) {
                $objDatabase->Execute("INSERT INTO ".DBPREFIX."module_downloads_rel_files_files
                (`rel_file`,`rel_related`) VALUES
                (".$FileId.", ".intval($_REQUEST["assignedDownloads"][$i]).")");
            }
        }

        return true;
    }

    /**
     * module settings
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
     */
    function _settings()
    {
        global $_ARRAYLANG, $objDatabase, $_CONFIG;
        $this->_pageTitle = $_ARRAYLANG['TXT_SETTINGS'];
        $this->_objTpl->loadTemplateFile('settings.html');


        // Save settings
        // ------------------------------------------------------
        if ($_REQUEST["mode"] == "save") {

            $query = "
              UPDATE ".DBPREFIX."module_downloads_settings SET
                  `setting_value`='".intval($_REQUEST["settings_filter"])."'
                where `setting_id`=1
            ";

            $objDatabase->Execute($query);
            $query = "
              UPDATE ".DBPREFIX."module_downloads_settings SET
                  `setting_value`='".$_REQUEST["settings_design"]."'
                where `setting_id`=2
            ";
            $objDatabase->Execute($query);
            header('location:index.php?cmd=downloads&act=settings&msg=1');
            exit();
        }

        if ($_REQUEST["msg"]=="1") {
            $this->arrStatusMsg['ok'][] = $_ARRAYLANG['TXT_DOWNLOADS_UPDATE_SUCCESSFULL'];
        }

        if ($this->_arrConfig["filter"]==1) {
            $filter_checked = 'checked';
        } else {
            $filter_checked = '';
        }

        for($x = 1; $x < 4; $x++) {
            if ($this->_arrConfig["design"]==$x) {
                $SlectedDesign[$x] = 'selected';
            } else {
                $SlectedDesign[$x] = '';
            }
        }

        $this->_objTpl->setVariable(array(
            'TXT_SETTINGS' => $_ARRAYLANG['TXT_SETTINGS'],
            'TXT_DOWNLOADS_FILTER' => $_ARRAYLANG['TXT_DOWNLOADS_FILTER'],
            'TXT_DOWNLOADS_DESIGN' => $_ARRAYLANG['TXT_DOWNLOADS_DESIGN'],
            'TXT_DOWNLOADS_NO_ICONS' => $_ARRAYLANG['TXT_DOWNLOADS_NO_ICONS'],
            'TXT_DOWNLOADS_ICON_SET' => $_ARRAYLANG['TXT_DOWNLOADS_ICON_SET'],
            'TXT_SAVE' => $_ARRAYLANG['TXT_SAVE'],
            'FILTER_CHECKED' => $filter_checked,
            'ICONS_SELECTED_1' => $SlectedDesign[1],
            'ICONS_SELECTED_2' => $SlectedDesign[2],
            'ICONS_SELECTED_3' => $SlectedDesign[3],
            'ICONS_SELECTED_4' => $SlectedDesign[4],
        ));
    }


    /**
     * placeholder
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
     */
    function _placeholder()
    {
        global $_ARRAYLANG, $objDatabase;
        $this->_pageTitle = $_ARRAYLANG['TXT_PLACEHOLDER'];
        $this->_objTpl->loadTemplateFile('placeholder.html');


        $this->_objTpl->setVariable(array(
            'TXT_DOWNLOADS_DOWNLOADS' => $_ARRAYLANG['TXT_DOWNLOADS_DOWNLOADS'],
            'TXT_DOWNLOADS_ICONS' => $_ARRAYLANG['TXT_DOWNLOADS_ICONS'],
            'TXT_DOWNLOADS_CATEGORIES' => $_ARRAYLANG['TXT_DOWNLOADS_CATEGORIES'],
            'TXT_PLACEHOLDER_FILE_ID' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_ID'],
            'TXT_PLACEHOLDER_FILE_NAME' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_NAME'],
            'TXT_PLACEHOLDER_FILE_DESC' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_DESC'],
            'TXT_PLACEHOLDER_FILE_TYPE' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_TYPE'],
            'TXT_PLACEHOLDER_FILE_SIZE' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_SIZE'],
            'TXT_PLACEHOLDER_FILE_IMG' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_IMG'],
            'TXT_PLACEHOLDER_FILE_AUTHOR' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_AUTHOR'],
            'TXT_PLACEHOLDER_FILE_CREATED' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_CREATED'],
            'TXT_PLACEHOLDER_FILE_LICENSE' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_LICENSE'],
            'TXT_PLACEHOLDER_FILE_VERSION' => $_ARRAYLANG['TXT_PLACEHOLDER_FILE_VERSION'],
            'TXT_PLACEHOLDER_CATEGORY_ID' => $_ARRAYLANG['TXT_PLACEHOLDER_CATEGORY_ID'],
            'TXT_PLACEHOLDER_CATEGORY_NAME' => $_ARRAYLANG['TXT_PLACEHOLDER_CATEGORY_NAME'],
            'TXT_PLACEHOLDER_CATEGORY_DESC' => $_ARRAYLANG['TXT_PLACEHOLDER_CATEGORY_DESC'],
            'TXT_PLACEHOLDER_ICON_DISPLAY' => $_ARRAYLANG['TXT_PLACEHOLDER_ICON_DISPLAY'],
            'TXT_PLACEHOLDER_ICON_FILTERS' => $_ARRAYLANG['TXT_PLACEHOLDER_ICON_FILTERS'],
            'TXT_PLACEHOLDER_ICON_CATEGORY' => $_ARRAYLANG['TXT_PLACEHOLDER_ICON_CATEGORY'],
            'TXT_PLACEHOLDER_ICON_FILE' => $_ARRAYLANG['TXT_PLACEHOLDER_ICON_FILE'],
            'TXT_PLACEHOLDER_ICON_DOWNLOAD' => $_ARRAYLANG['TXT_PLACEHOLDER_ICON_DOWNLOAD'],
            'TXT_PLACEHOLDER_ICON_INFO' => $_ARRAYLANG['TXT_PLACEHOLDER_ICON_INFO'],
        ));

    }


    /**
     * _CategoryEdit
     *
     * @global object $objDatabase
     * @global array $_ARRAYLANG
    function _CategoryEdit($mode)
    {}
     */


    /**
     * _DeleteDownload
     *
     * @var int    $id
     * @global object $objDatabase
     */
    function _DeleteDownload($id)
    {
        global $objDatabase;
        if (intval($id)>0) {
            $query = "DELETE FROM ".DBPREFIX."module_downloads_files WHERE file_id=".$id;
            $objDatabase->Execute($query);
            $query = "DELETE FROM ".DBPREFIX."module_downloads_files_lang WHERE file=".$id;
            $objDatabase->Execute($query);
            $query = "DELETE FROM ".DBPREFIX."module_downloads_files_locales WHERE loc_file=".$id;
            $objDatabase->Execute($query);
            $query = "DELETE FROM ".DBPREFIX."module_downloads_rel_files_cat WHERE rel_file=".$id;
            $objDatabase->Execute($query);
            $query = "DELETE FROM ".DBPREFIX."module_downloads_rel_files_files WHERE rel_file=".$id;
            $objDatabase->Execute($query);
            return true;
        } else {
            return false;
        }
    }


    /**
     * Update Download
     *
     * @global object $objDatabase
     */
    function UpdateDownload()
    {
        global $objDatabase;

        $FileName = '';
        $FileUrl = '';
        $FileId = intval($_REQUEST["id"]);
        $DownlaodInfo = $this->_FileInfo($FileId);

        if ($_REQUEST["file_select"]=="1") {
            if ($_REQUEST["file_source"]!='') {
                $FileName = addslashes(strip_tags($_REQUEST["file_source"]));
            }
        } elseif ($_REQUEST["file_select"]=="2") {
            if ($_REQUEST["file_url"]!='') {
                $FileUrl = addslashes(strip_tags($_REQUEST["file_url"]));
                if (substr($FileUrl, 0, 7)!='http://' && substr($FileUrl, 0, 8)!='https://') {
                    $FileUrl = 'http://'.$FileUrl;
                }
            }
        }

        $FileType = addslashes(strip_tags($_REQUEST["file_type"]));
        $FileSize = addslashes(strip_tags($_REQUEST["file_size"]));
        $FileLicense = addslashes(strip_tags($_REQUEST["file_license"]));
        $FileVersion = addslashes(strip_tags($_REQUEST["file_version"]));
        $FileAuthor = addslashes(strip_tags($_REQUEST["file_author"]));
        $FileImage = addslashes(strip_tags($_POST['file_image']));

        if ($_REQUEST["protected"]=="1") {
            $FileProtected = 1;
        } else {
            $FileProtected = 0;
        }

        if ($_REQUEST["file_state"]=="1") {
            $file_state = 1;
        } else {
            $file_state = 0;
        }

        // File
        // -----------------------------------------------------------------
        $query = "
              UPDATE ".DBPREFIX."module_downloads_files SET
                `file_name`='".$FileName."',
                `file_url`='".$FileUrl."',
                `file_type`='".$FileType."',
                `file_size`='".$FileSize."',
                `file_img`='".$FileImage."',
                `file_autor`='".$FileAuthor."',
                `file_protected`='".$FileProtected."',
                `file_license`='".$FileLicense."',
                `file_version`='".$FileVersion."',
                `file_state`='".$file_state."'
                where file_id=".$FileId."
        ";
        $objDatabase->Execute($query);

        // Categories
        // -----------------------------------------------------------------

        $query = "DELETE FROM ".DBPREFIX."module_downloads_rel_files_cat WHERE `rel_file`=".$FileId." ";
        $objDatabase->Execute($query);

        for($i=0; $i<=count($_REQUEST["assignedCategories"]); $i++) {
            if (intval($_REQUEST["assignedCategories"][$i])>0) {
                $query = "
                        INSERT INTO ".DBPREFIX."module_downloads_rel_files_cat
                            (`rel_file`, `rel_category`) VALUES
                            ('".$FileId."', '".$_REQUEST["assignedCategories"][$i]."')
                ";
                $objDatabase->Execute($query);
            }
        }

        // Name & Description
        // -----------------------------------------------------------------
        foreach (array_keys($this->_arrLang) as $langId) {
            if (intval($langId)>0) {
//
//                // insert lang
//                // ------------------------------------------------
//                $query = "INSERT INTO ".DBPREFIX."module_downloads_files_lang
//                            SET file='".$FileId."',
//                            language='".$langId."'";
//                $objDatabase->Execute($query);


                $query = "UPDATE ".DBPREFIX."module_downloads_files_locales SET
                            `loc_name`='".addslashes(strip_tags($_POST['file_name_'.$langId]))."',
                            `loc_desc`='".addslashes(strip_tags($_POST['file_desc_'.$langId]))."'
                            WHERE `loc_file`=".$FileId." AND `loc_lang`=".$langId."
                ";
//                echo($query."<br />");
                $objDatabase->Execute($query);
            }
        }

        // Access ID
        // -----------------------------------------------------------------

        $query = "DELETE FROM ".DBPREFIX."access_group_dynamic_ids WHERE `access_id`=".$DownlaodInfo["file_access_id"]." ";
        $objDatabase->Execute($query);

        if ($FileProtected==1) {
            for($i=0; $i<=count($_REQUEST["assignedGroups"]); $i++) {
                if (intval($_REQUEST["assignedGroups"][$i])>0) {
                    $objDatabase->Execute("INSERT INTO ".DBPREFIX."access_group_dynamic_ids
                    (`access_id`,`group_id`) VALUES
                    (".$DownlaodInfo["file_access_id"].", ".intval($_REQUEST["assignedGroups"][$i]).")");
                }
            }
        }

        // Related downloads
        // -----------------------------------------------------------------

        $query = "DELETE FROM ".DBPREFIX."module_downloads_rel_files_files WHERE `rel_file`=".$FileId." ";
        $objDatabase->Execute($query);

        for($i=0; $i<=count($_REQUEST["assignedDownloads"]); $i++) {
            if (intval($_REQUEST["assignedDownloads"][$i])>0) {
                $objDatabase->Execute("INSERT INTO ".DBPREFIX."module_downloads_rel_files_files
                (`rel_file`,`rel_related`) VALUES
                (".$FileId.", ".intval($_REQUEST["assignedDownloads"][$i]).")");
            }
        }

        return true;
    }

}

?>
