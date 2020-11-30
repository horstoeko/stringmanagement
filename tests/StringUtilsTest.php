<?php

namespace horstoeko\stringmanagement\tests;

use \PHPUnit\Framework\TestCase;
use \horstoeko\stringmanagement\StringUtils;

class StringUtilsTest extends TestCase
{
    public function testStringIsNullOrEmpty()
    {
        $this->assertTrue(StringUtils::stringIsNullOrEmpty(null));
        $this->assertTrue(StringUtils::stringIsNullOrEmpty(""));
        $this->assertFalse(StringUtils::stringIsNullOrEmpty("abc"));
    }

    public function testStrisstartingwith()
    {
        $this->assertTrue(StringUtils::strisstartingwith("abcdef", "abc"));
        $this->assertFalse(StringUtils::strisstartingwith("abcdef", "ABC"));
        $this->assertTrue(StringUtils::strisstartingwith("abcdef", "ABC", true));
        $this->assertFalse(StringUtils::strisstartingwith("abcdef", "def"));
        $this->assertFalse(StringUtils::strisstartingwith("abcdef", "def", true));
    }
}
