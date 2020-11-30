<?php

namespace horstoeko\stringmanagement\tests;

use \PHPUnit\Framework\TestCase;
use \horstoeko\stringmanagement\FileUtils;

class FileUtilsTest extends TestCase
{
    /**
     * @covers \horstoeko\stringmanagement\FileUtils::combinePathWithFile
     */
    public function testCombinePathWithFile()
    {
        $this->assertTrue(FileUtils::fileExists(__FILE__, true));
        $this->assertFalse(FileUtils::fileExists(__FILE__ . ".xxx", true));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileToBase64
     */
    public function testFileToBase64()
    {
        $this->assertEquals("PD9waHANCg0KbmFtZXNwYWN", substr(FileUtils::fileToBase64(__FILE__), 0, 23));
        $this->assertEquals(false, FileUtils::fileToBase64(__FILE__ . ".xxx"));
    }
}
