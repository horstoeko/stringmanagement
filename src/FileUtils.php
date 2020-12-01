<?php

/**
 * This file is a part of horstoeko/stringmanagement.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\stringmanagement;

use horstoeko\stringmanagement\StringUtils;
use horstoeko\stringmanagement\PathUtils;

/**
 * Class representing some string utilities for files
 *
 * @category StringManagement
 * @package  StringManagement
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/stringmanagement
 */
class FileUtils
{
    /**
     * Check if file $filename exists, also checks if it's readable
     * To turn off the readble check set $checkreadable to false
     *
     * @param string $filename
     * @param boolean $checkreadable
     * @return boolean
     */
    public static function fileExists(string $filename, bool $checkreadable = true): bool
    {
        $exists = file_exists($filename);

        if ($exists === true && $checkreadable === true) {
            $exists = is_readable($filename);
        }

        return $exists;
    }

    /**
     * Converts a file $filename to base64 string. If the file does not exist
     * this function returns false
     *
     * @param string $filename
     * @return boolean|string
     */
    public static function fileToBase64(string $filename)
    {
        if (self::fileExists($filename) === false) {
            return false;
        }

        $data = file_get_contents($filename);

        if ($data === false) {
            return false;
        }

        $data = base64_encode($data);

        if (StringUtils::stringIsNullOrEmpty($data)) {
            return false;
        }

        return $data;
    }

    /**
     * Converts the content of a file to BASE64 encoded file
     *
     * @param string $filename
     * Source filename
     * @param string $toFilename
     * Filename to which the BASE64 is saved to
     * @return boolean
     */
    public static function fileToBase64File(string $filename, string $toFilename): bool
    {
        $base64String = static::fileToBase64($filename);

        if ($base64String === false) {
            return false;
        }

        if (file_put_contents($toFilename, $base64String) === false) {
            return false;
        }

        return true;
    }

    /**
     * Combine a filename (which has no extension) with a fileextension
     *
     * @param string $filename
     * @param string $fileextension
     * @return string
     */
    public static function combineFilenameWithFileextension(string $filename, string $fileextension): string
    {
        $extensionDelimiter = ".";
        $filename = rtrim($filename, $extensionDelimiter);
        $fileextension = ltrim($fileextension, $extensionDelimiter);
        return $filename . $extensionDelimiter . $fileextension;
    }

    /**
     * Returns the directory where $filename is located
     *
     * @param string $filename
     * @return string
     */
    public static function getFileDirectory(string $filename): string
    {
        return pathinfo($filename, PATHINFO_DIRNAME);
    }

    /**
     * Returns the filename only including it's extension
     *
     * @param string $filename
     * @return string
     */
    public static function getFilenameWithExtension(string $filename): string
    {
        return pathinfo($filename, PATHINFO_BASENAME);
    }

    /**
     * Returns the filename only without it's extension
     *
     * @param string $filename
     * @return string
     */
    public static function getFilenameWithoutExtension(string $filename): string
    {
        return pathinfo($filename, PATHINFO_FILENAME);
    }

    /**
     * Returns the fileextension of a $filename, Optionally you can
     * add the dot on the beginning
     *
     * @param string $filename
     * @param boolean $withdot
     * @return string
     */
    public static function getFileExtension(string $filename, bool $withdot = false): string
    {
        $extension = ltrim(pathinfo($filename, PATHINFO_EXTENSION), ".");

        if ($withdot === true) {
            $extension = "." . $extension;
        }

        return $extension;
    }

    /**
     * Change the extension of a filename
     *
     * @param string $filename
     * @param string $newFileextension
     * @return string
     */
    public static function changeFileExtension(string $filename, string $newFileextension): string
    {
        $directory = static::getFileDirectory($filename);
        $filename = static::getFilenameWithoutExtension($filename);
        return PathUtils::combinePathWithFile($directory, static::combineFilenameWithFileextension($filename, $newFileextension));
    }
}
