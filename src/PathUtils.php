<?php

/**
 * This file is a part of horstoeko/stringmanagement.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\stringmanagement;

/**
 * Class representing some string utilities for directories/paths
 *
 * @category StringManagement
 * @package  StringManagement
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/stringmanagement
 */
class PathUtils
{
    /**
     * Combine a path and a filename savely
     *
     * @param string $path
     * @param string $filename
     * @return string
     */
    public static function combinePathWithFile(string $path, string $filename): string
    {
        $path = rtrim($path, DIRECTORY_SEPARATOR);
        $filename = ltrim($filename, DIRECTORY_SEPARATOR);
        return $path . DIRECTORY_SEPARATOR . $filename;
    }

    /**
     * Combine two paths savely
     *
     * @param string $path
     * @param string $path2
     * @return string
     */
    public static function combinePathWithPath(string $path, string $path2): string
    {
        $path = rtrim($path, DIRECTORY_SEPARATOR);
        $path2 = ltrim($path2, DIRECTORY_SEPARATOR);
        return $path . DIRECTORY_SEPARATOR . $path2;
    }

    /**
     * Combine multiple paths
     *
     * @param string ...$paths
     * @return string
     */
    public static function combineAllPaths(...$paths): string
    {
        $result = "";

        foreach ($paths as $path) {
            $result = self::combinePathWithPath($result, $path);
        }

        return $result;
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
     * Get the extension of a file. The return values starts with a dot
     *
     * @param string $filename
     * @return string
     */
    public static function getFileExtension(string $filename): string
    {
        $fileextension = pathinfo($filename, PATHINFO_EXTENSION);
        if (substr($fileextension, 0, 1) != ".") {
            $fileextension = "." . $fileextension;
        }
        return $fileextension;
    }
}
