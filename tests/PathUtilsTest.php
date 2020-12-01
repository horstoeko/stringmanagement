<?php

namespace horstoeko\stringmanagement\tests;

use \PHPUnit\Framework\TestCase;
use \horstoeko\stringmanagement\PathUtils;

class PathUtilsTest extends TestCase
{
    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combinePathWithFile
     */
    public function testCombinePathWithFile()
    {
        $this->assertEquals("/home/user/test.txt", PathUtils::combinePathWithFile("/home/user", "test.txt"));
        $this->assertEquals("/home/user/test.txt", PathUtils::combinePathWithFile("/home/user/", "test.txt"));
        $this->assertEquals("/home/user/test.txt", PathUtils::combinePathWithFile("/home/user", "/test.txt"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combinePathWithPath
     */
    public function testCombinePathWithPath()
    {
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home", "user"));
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home", "/user"));
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home//", "/user"));
        $this->assertEquals("/home/user", PathUtils::combinePathWithPath("/home//", "user"));
    }

    /**
     * @covers \horstoeko\stringmanagement\PathUtils::combineAllPaths
     */
    public function testCombineAllPaths()
    {
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("home", "user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home", "user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home", "/user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home", "/user", "/john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home//", "user", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home//", "/user//", "john"));
        $this->assertEquals("/home/user/john", PathUtils::combineAllPaths("/home//", "/user//", "/john"));
    }
}
