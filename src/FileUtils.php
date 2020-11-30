<?php

/**
 * This file is a part of horstoeko/stringmanagement.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\stringmanagement;

use horstoeko\stringmanagement\StringUtils;

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
        $data = base64_encode($data);

        if (StringUtils::stringIsNullOrEmpty($data)) {
            return false;
        }

        return $data;
    }
}
