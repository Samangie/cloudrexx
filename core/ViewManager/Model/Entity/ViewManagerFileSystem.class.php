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


namespace Cx\Core\ViewManager\Model\Entity;

/**
 * Class ViewManagerFileSystem
 *
 * @copyright   Cloudrexx AG
 * @author      Robin Glauser <robin.glauser@comvation.com>
 * @author      Thomas Däppen <thomas.daeppen@cloudrexx.com>
 * @package     cloudrexx
 * @subpackage  core_viewmanager
 */
class ViewManagerFileSystem extends \Cx\Core\MediaSource\Model\Entity\LocalFileSystem
{
    /**
     * An array containing additional file systems of
     * type \Cx\Core\MediaSource\Model\Entity\LocalFileSystem
     *
     * @var array
     */
    protected $additionalFileSystems = array();

    function __construct($path)
    {
        parent::__construct($path);

        if ($path != $this->cx->getCodeBaseThemesPath()) {
            $this->additionalFileSystems[]
                = new \Cx\Core\MediaSource\Model\Entity\LocalFileSystem($this->cx->getCodeBaseThemesPath());
        }
    }

    /**
     * @param            $directory
     * @param bool|false $recursive
     *
     * @return array
     */
    public function getFileList($directory, $recursive = true)
    {
        $fileList = array();

        // fetch files from additional file systems
        foreach ($this->additionalFileSystems as $fileSystem) {
            $additionalFileList = $fileSystem->getFileList(
                $directory, $recursive, true
            );
            $fileList = $this->mergeFileList($fileList, $additionalFileList);
        }

        // fetch files form local file system
        $websiteFileList = parent::getFileList($directory, $recursive);
        if (!empty($websiteFileList)) {
            $fileList = $this->mergeFileList($fileList, $websiteFileList);
        }
        return $fileList;
    }

    /**
     * Merge two file lists into one
     *
     * @param $a
     * @param $b
     *
     * @return array
     */
    public function mergeFileList($a, $b)
    {
        if (empty($b)) {
            return $a;
        }
        if (empty($a)) {
            return $b;
        }
        if (!is_array($b)) {
            return $b;
        }
        $resultFileList = $a;
        foreach ($b as $name => $directory) {
            $filesList = $this->mergeFileList(
                isset($resultFileList[$name]) ? $resultFileList[$name] : '', $directory
            );
            $resultFileList[$name] = $filesList;
        }
        return $resultFileList;
    }

    /**
     * Get full path of the given file,
     * If file is application template then load from website/codebase path
     * else
     * Path will be checked in the following order
     * 1. website repository
     * 2. server website repository
     * 3. codebase repository
     *
     * @param \Cx\Core\MediaSource\Model\Entity\File $file File object
     * @return string Full path of the given file
     */
    public function getFullPath(\Cx\Core\MediaSource\Model\Entity\File $file)
    {
        $basePath = $this->getRootPath();
        if ($file->isApplicationTemplateFile()) {
            if (file_exists($this->cx->getWebsiteDocumentRootPath() . $file->__toString())) {
                $basePath = $this->cx->getWebsiteDocumentRootPath();
            } else {
                $basePath = $this->cx->getCodeBaseDocumentRootPath();
            }
        } elseif (file_exists($this->getRootPath() . $file->__toString())) {
            $basePath = $this->getRootPath();
        } elseif ($path = $this->locateFileInAdditionalFileSystem($file->__toString())) {
            $basePath = $path;
        }
        return $basePath . rtrim(ltrim($file->getPath(), '.'), '/') . '/';
    }

    /**
     * Locate a file in one of the additional file systems
     * and return the containing file system's root path.
     * The additional file systems are defined in
     * $this->additionalFileSystems
     *
     * @param   string  $filePath   Path to the file to locate
     * @return  mixed   Returns the root path of the file system
     *                  the file is located in as string.
     *                  If the file can't be located in any of
     *                  the additional file systems FALSE is returned.
     */                  
    protected function locateFileInAdditionalFileSystem($filePath)
    {
        // lookup the filesystems in reverse order
        // -> we first shall try to locate the file in the
        // file system that has been added as additional file system
        // the latest.
        $fileSystems = array_reverse($this->additionalFileSystems);
        foreach ($fileSystems as $fileSystem) {
            if (
                $fileSystem->fileExists(
                    new ViewManagerFile($filePath, $fileSystem)
                )
            ) {
                return $fileSystem->getRootPath();
            }
        }

        return false;
    }

    /**
     * Check whether the file is read only
     * 
     * @param \Cx\Core\MediaSource\Model\Entity\File $file File object
     * @return boolean
     */
    public function isReadOnly(\Cx\Core\MediaSource\Model\Entity\File $file)
    {
        if ($this->fileExists($file)) {
            return false;
        }
        return true;
    }

    /**
     * Check whether the file is resettable
     *
     * @param \Cx\Core\MediaSource\Model\Entity\File $file File object
     * @return boolean
     */
    public function isResettable(\Cx\Core\MediaSource\Model\Entity\File $file)
    {
        if (!$this->fileExists($file)) {
            return false;
        }

        if ($this->locateFileInAdditionalFileSystem($file->__toString())) {
            return true;
        }

        return false;
    }

    /**
     * Check whether the file is image
     *
     * @param \Cx\Core\MediaSource\Model\Entity\File $file
     *
     * @return boolean
     */
    public function isImageFile(\Cx\Core\MediaSource\Model\Entity\File $file)
    {
        return $this->isImage($file->getExtension());
    }

    /**
     * Copies the folder from the additional file systems and current filesystem to the given new folder path
     *
     * @param \Cx\Core\ViewManager\Model\Entity\ViewManagerFile $fromFile
     * @param \Cx\Core\ViewManager\Model\Entity\ViewManagerFile $toFile
     * @return boolean Status of the folder copy
     */
    public function copyFolder(ViewManagerFile $fromFile, ViewManagerFile $toFile)
    {
        // copy folder from additional file systems
        foreach ($this->additionalFileSystems as $fileSystem) {
            if (!$fileSystem->fileExists($fromFile)) {
                continue;
            }

            if (!\Cx\Lib\FileSystem\FileSystem::copy_folder(
                    $fileSystem->getRootPath() . $fromFile->__toString(),
                    $this->getRootPath() . $toFile->__toString(), true
                )
            ) {
                return false;
            }
        }

        // if folder does not exist in local file system, then we're all done
        if (!$this->fileExists($fromFile)) {
            return true;
        }

        if (!\Cx\Lib\FileSystem\FileSystem::copy_folder(
                $this->getRootPath() . $fromFile->__toString(),
                $this->getRootPath() . $toFile->__toString(), true
            )
        ) {
            return false;
        }

        return true;
    }

    /**
     * Get File object from the path
     *
     * @param string  $filepath File path
     * @param boolean $force    True, return the File object also if the given file not exists or
     *                          False, return the file object if the file exists
     * @return ViewManagerFile File Object
     */
    public function getFileFromPath($filepath, $force = false)
    {
        if ($force) {
            return new ViewManagerFile($filepath, $this);
        }

        $fileinfo = pathinfo($filepath);
        $files    = $this->getFileList($fileinfo['dirname']);
        if (!isset($files[$fileinfo['basename']])) {
            return false;
        }

        return new ViewManagerFile($filepath, $this);
    }
}
