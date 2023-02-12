<?php

namespace horstoeko\stringmanagement\tests;

use \PHPUnit\Framework\TestCase;
use \horstoeko\stringmanagement\FileUtils;

class FileUtilsTest extends TestCase
{
    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileExists
     */
    public function testFileExists(): void
    {
        $this->assertTrue(FileUtils::fileExists(__FILE__, true));
        $this->assertFalse(FileUtils::fileExists(__FILE__ . ".xxx", true));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileToBase64
     */
    public function testFileToBase64(): void
    {
        $this->assertEquals("SSBhbSBhIHRlc3RmaWxl", substr(FileUtils::fileToBase64(dirname(__FILE__) . "/data/tobase64.txt"), 0, 20));
        $this->assertEquals(false, FileUtils::fileToBase64(__FILE__ . ".xxx"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileToBase64File
     */
    public function testFileToBase64File(): void
    {
        $sourceFilename = dirname(__FILE__) . "/data/tobase64.txt";
        $destinationFilename = dirname(__FILE__) . "/data/encbase64.txt";
        $this->assertTrue(FileUtils::fileToBase64File($sourceFilename, $destinationFilename));
        $this->assertTrue(FileUtils::fileExists($destinationFilename));
        $destinationFilenameContent = file_get_contents($destinationFilename);
        $this->assertEquals("SSBhbSBhIHRlc3RmaWxl", substr($destinationFilenameContent, 0, 20));
        @unlink($destinationFilename);
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::fileToBase64File
     */
    public function testFileToBase64FileSourceNotExisting(): void
    {
        $sourceFilename = dirname(__FILE__) . "/data/tobase64_2.txt";
        $destinationFilename = dirname(__FILE__) . "/data/encbase64_2.txt";
        $this->assertFalse(FileUtils::fileToBase64File($sourceFilename, $destinationFilename));
        $this->assertFalse(FileUtils::fileExists($destinationFilename));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::base64ToFile
     */
    public function testBase64ToFile(): void
    {
        $sourceData = "SSBhbSBhIHRlc3RmaWxlLiBEb24ndCBtb2RpZnkgbWUuLi4=";
        $destinationFilename = dirname(__FILE__) . "/data/decbase64.txt";
        $this->assertTrue(FileUtils::base64ToFile($sourceData, $destinationFilename));
        $this->assertTrue(FileUtils::fileExists($destinationFilename));
        $destinationFilenameContent = file_get_contents($destinationFilename);
        $this->assertEquals("I am a testfile. Don", substr($destinationFilenameContent, 0, 20));
        @unlink($destinationFilename);
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::base64FileToFile
     */
    public function testBase64FileToFile(): void
    {
        $sourceFilename = dirname(__FILE__) . "/data/base64.txt";
        $destinationFilename = dirname(__FILE__) . "/data/decbase64.txt";
        $this->assertTrue(FileUtils::base64FileToFile($sourceFilename, $destinationFilename));
        $this->assertTrue(FileUtils::fileExists($destinationFilename));
        $destinationFilenameContent = file_get_contents($destinationFilename);
        $this->assertEquals("I am a testfile. Don", substr($destinationFilenameContent, 0, 20));
        @unlink($destinationFilename);
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::combineFilenameWithFileextension
     */
    public function testCombineFilenameWithFileextension(): void
    {
        $this->assertEquals("file.txt", FileUtils::combineFilenameWithFileextension("file", "txt"));
        $this->assertEquals("file.txt", FileUtils::combineFilenameWithFileextension("file.", "txt"));
        $this->assertEquals("file.txt", FileUtils::combineFilenameWithFileextension("file.", ".txt"));
        $this->assertEquals("file.txt", FileUtils::combineFilenameWithFileextension("file..", "txt"));
        $this->assertEquals("file.txt", FileUtils::combineFilenameWithFileextension("file..", "..txt"));
        $this->assertEquals("file.x.txt", FileUtils::combineFilenameWithFileextension("file.x", "txt"));
        $this->assertEquals("file.x.txt", FileUtils::combineFilenameWithFileextension("file.x", ".txt"));
        $this->assertEquals("/home/john/file.txt", FileUtils::combineFilenameWithFileextension("/home/john/file", "txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::getFileDirectory
     */
    public function testGetFileDirectory(): void
    {
        $this->assertEquals("/home/john", FileUtils::getFileDirectory("/home/john/file.txt"));
        $this->assertEquals("/home/john", FileUtils::getFileDirectory("/home/john/file.x.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::getFilenameWithExtension
     */
    public function testGetFilenameWithExtension(): void
    {
        $this->assertEquals("file.txt", FileUtils::getFilenameWithExtension("/home/john/file.txt"));
        $this->assertEquals("file.x.txt", FileUtils::getFilenameWithExtension("/home/john/file.x.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::getFilenameWithoutExtension
     */
    public function testGetFilenameWithoutExtension(): void
    {
        $this->assertEquals("file", FileUtils::getFilenameWithoutExtension("/home/john/file.txt"));
        $this->assertEquals("file.x", FileUtils::getFilenameWithoutExtension("/home/john/file.x.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::getFileExtension
     */
    public function testGetFileExtension(): void
    {
        $this->assertEquals(".txt", FileUtils::getFileExtension("file.txt", true));
        $this->assertEquals(".txt", FileUtils::getFileExtension("file.x.txt", true));
        $this->assertEquals(".txt", FileUtils::getFileExtension("/home/john/file.x.txt", true));
        $this->assertEquals("txt", FileUtils::getFileExtension("file.txt"));
        $this->assertEquals("txt", FileUtils::getFileExtension("file.x.txt"));
        $this->assertEquals("txt", FileUtils::getFileExtension("/home/john/file.x.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::changeFileExtension
     */
    public function testChangeFileExtension(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $this->assertEquals(".{$ds}file.new", FileUtils::changeFileExtension("file.txt", "new"));
        $this->assertEquals(".{$ds}file.new", FileUtils::changeFileExtension("file.txt", ".new"));
        $this->assertEquals("{$ds}home{$ds}john{$ds}file.new", FileUtils::changeFileExtension("{$ds}home{$ds}john{$ds}file.txt", "new"));
        $this->assertEquals("{$ds}home{$ds}john{$ds}file.new", FileUtils::changeFileExtension("{$ds}home{$ds}john{$ds}file.txt", ".new"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::getFileSize
     */
    public function testGetFileSize(): void
    {
        $this->assertEquals(35, FileUtils::getFileSize(dirname(__FILE__) . "/data/tobase64.txt"));
        $this->assertEquals(0, FileUtils::getFileSize(dirname(__FILE__) . "/data/filenotexists.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\FileUtils::getFileSizeFromBase64String
     */
    public function testGetFileSizeFromBase64String(): void
    {
        $this->assertEquals(35, FileUtils::getFileSizeFromBase64String("SSBhbSBhIHRlc3RmaWxlLiBEb24ndCBtb2RpZnkgbWUuLi4="));
        $this->assertEquals(0, FileUtils::getFileSizeFromBase64String(""));
    }
}
