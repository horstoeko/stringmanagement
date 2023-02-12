<?php

namespace horstoeko\stringmanagement\tests;

use \PHPUnit\Framework\TestCase;
use \horstoeko\stringmanagement\PathUtils;

class PathUtilsTest extends TestCase
{
    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combinePathWithFile
     */
    public function testCombinePathWithFile(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $this->assertEquals("{$ds}home{$ds}user{$ds}test.txt", PathUtils::combinePathWithFile("{$ds}home{$ds}user", "test.txt"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}test.txt", PathUtils::combinePathWithFile("{$ds}home{$ds}user{$ds}", "test.txt"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}test.txt", PathUtils::combinePathWithFile("{$ds}home{$ds}user", "{$ds}test.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combinePathWithPath
     */
    public function testCombinePathWithPath(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $this->assertEquals("{$ds}home{$ds}user", PathUtils::combinePathWithPath("{$ds}home", "user"));
        $this->assertEquals("{$ds}home{$ds}user", PathUtils::combinePathWithPath("{$ds}home", "{$ds}user"));
        $this->assertEquals("{$ds}home{$ds}user", PathUtils::combinePathWithPath("{$ds}home{$ds}{$ds}", "{$ds}user"));
        $this->assertEquals("{$ds}home{$ds}user", PathUtils::combinePathWithPath("{$ds}home{$ds}{$ds}", "user"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combineAllPaths
     */
    public function testCombineAllPaths(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $this->assertEquals("home{$ds}user{$ds}john", PathUtils::combineAllPaths("home", "user", "john"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}john", PathUtils::combineAllPaths("{$ds}home", "user", "john"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}john", PathUtils::combineAllPaths("{$ds}home", "{$ds}user", "john"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}john", PathUtils::combineAllPaths("{$ds}home", "{$ds}user", "{$ds}john"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}john", PathUtils::combineAllPaths("{$ds}home{$ds}{$ds}", "user", "john"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}john", PathUtils::combineAllPaths("{$ds}home{$ds}{$ds}", "{$ds}user{$ds}{$ds}", "john"));
        $this->assertEquals("{$ds}home{$ds}user{$ds}john", PathUtils::combineAllPaths("{$ds}home{$ds}{$ds}", "{$ds}user{$ds}{$ds}", "{$ds}john"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::getHashedDirectory
     */
    public function testGetHashedDirectory(): void
    {
        $this->assertNotEquals("", PathUtils::getHashedDirectory(3));
        $this->assertEquals(3, substr_count(PathUtils::getHashedDirectory(3), DIRECTORY_SEPARATOR));
        $this->assertStringStartsWith(DIRECTORY_SEPARATOR, PathUtils::getHashedDirectory(3));
        $this->assertStringEndsNotWith(DIRECTORY_SEPARATOR, PathUtils::getHashedDirectory(3));
        $this->expectException(\Exception::class);
        PathUtils::getHashedDirectory(0);
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::createHashedDirectory
     * @covers \horstoeko\stringmanagement\PathUtils::recursiveRemoveDirectory
     */
    public function testCreateHashedDirectory(): void
    {
        $ds = DIRECTORY_SEPARATOR;

        $baseDirectory = PathUtils::combineAllPaths(__DIR__, "test");
        $createdDirectory = PathUtils::createHashedDirectory($baseDirectory, 3);

        $this->assertIsString($createdDirectory);
        $this->assertNotEquals("", PathUtils::getHashedDirectory(3));
        $this->assertEquals(3, substr_count(PathUtils::getHashedDirectory(3), DIRECTORY_SEPARATOR));
        $this->assertStringStartsWith("{$ds}", PathUtils::getHashedDirectory(3));
        $this->assertStringEndsNotWith("{$ds}", PathUtils::getHashedDirectory(3));
        $this->assertTrue(is_dir($createdDirectory));
        $this->assertTrue(file_exists($createdDirectory));

        PathUtils::recursiveRemoveDirectory($baseDirectory);

        $this->assertFalse(is_dir($createdDirectory));
        $this->assertFalse(file_exists($createdDirectory));
    }
}
