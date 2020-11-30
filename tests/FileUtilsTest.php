<?php

namespace horstoeko\stringmanagement\tests;

use \PHPUnit\Framework\TestCase;
use \horstoeko\stringmanagement\FileUtils;

class FileUtilsTest extends TestCase
{
    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileExists
     */
    public function testFileExists()
    {
        $this->assertTrue(FileUtils::fileExists(__FILE__, true));
        $this->assertFalse(FileUtils::fileExists(__FILE__ . ".xxx", true));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileToBase64
     */
    public function testFileToBase64()
    {
        $this->assertEquals("PD9waHA", substr(FileUtils::fileToBase64(__FILE__), 0, 7));
        $this->assertEquals(false, FileUtils::fileToBase64(__FILE__ . ".xxx"));
    }
}
