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
        $this->assertEquals("/home/user/test.txt", PathUtils::combinePathWithFile("/home/user", "test.txt"));
        $this->assertEquals("/home/user/test.txt", PathUtils::combinePathWithFile("/home/user/", "test.txt"));
        $this->assertEquals("/home/user/test.txt", PathUtils::combinePathWithFile("/home/user", "/test.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combinePathWithPath
     */
    public function testCombinePathWithPath(): void
    {
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home", "user"));
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home", "/user"));
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home//", "/user"));
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home//", "user"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combineAllPaths
     */
    public function testCombineAllPaths(): void
    {
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("home", "user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home", "user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home", "/user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home", "/user", "/john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home//", "user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home//", "/user//", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home//", "/user//", "/john"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::getHashedDirectory
     */
    public function testGetHashedDirectory(): void
    {
        $this->assertNotEquals("", PathUtils::getHashedDirectory(3));
        $this->assertEquals(3, substr_count(PathUtils::getHashedDirectory(3), DIRECTORY_SEPARATOR));
        $this->assertStringStartsWith("/", PathUtils::getHashedDirectory(3));
        $this->assertStringEndsNotWith("/", PathUtils::getHashedDirectory(3));
        $this->expectException(\Exception::class);
        PathUtils::getHashedDirectory(0);
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::createHashedDirectory
     * @covers \horstoeko\stringmanagement\PathUtils::recursiveRemoveDirectory
     */
    public function testCreateHashedDirectory(): void
    {
        $baseDirectory = PathUtils::combineAllPaths(__DIR__, "test");
        $createdDirectory = PathUtils::createHashedDirectory($baseDirectory, 3);

        $this->assertIsString($createdDirectory);
        $this->assertNotEquals("", PathUtils::getHashedDirectory(3));
        $this->assertEquals(3, substr_count(PathUtils::getHashedDirectory(3), DIRECTORY_SEPARATOR));
        $this->assertStringStartsWith("/", PathUtils::getHashedDirectory(3));
        $this->assertStringEndsNotWith("/", PathUtils::getHashedDirectory(3));
        $this->assertTrue(is_dir($createdDirectory));
        $this->assertTrue(file_exists($createdDirectory));

        PathUtils::recursiveRemoveDirectory($baseDirectory);

        $this->assertFalse(is_dir($createdDirectory));
        $this->assertFalse(file_exists($createdDirectory));
    }
}
