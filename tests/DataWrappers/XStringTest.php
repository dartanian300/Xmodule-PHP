<?php

require_once(__DIR__.'/../../src/DataWrappers/XString.php');

use PHPUnit\Framework\TestCase;

class XStringTest extends TestCase{
    protected $value = 'This is a string';
    
    
    /** BASIC USE - NO FORMAT **/
    public function testConstructorSetNoFormat()
    {
        $obj = new \XModule\DataWrappers\XString($this->value);
        $this->assertSame($obj->get(), $this->value);
    }
    
    public function testSetNoFormat()
    {
        $obj = new \XModule\DataWrappers\XString();
        $obj->set($this->value);
        $this->assertSame($obj->get(), $this->value);
    }
    
    /** USE FORMAT - Valid **/
    
    /**
     *  @dataProvider validFormatProvider
     */
    public function testConstructorValidFormat($string, $format)
    {
        $obj = new \XModule\DataWrappers\XString($string, $format);
        $this->assertSame($obj->get(), $string);
    }
    
    /**
     *  @dataProvider validFormatProvider
     */
    public function testSetValidFormat($string, $format)
    {
        $obj = new \XModule\DataWrappers\XString();
        $obj->setFormat($format);
        $obj->set($string);
        $this->assertSame($obj->get(), $string);
    }
    
    
    /** USE FORMAT - Invalid **/
    
    /**
     *  @dataProvider invalidFormatProvider
     */
    public function testConstructorInvalidFormat($string, $format)
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new \XModule\DataWrappers\XString($string, $format);
        $this->assertSame($obj->get(), $string);
    }
    
    /**
     *  @dataProvider invalidFormatProvider
     */
    public function testSetInvalidFormat($string, $format)
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new \XModule\DataWrappers\XString();
        $obj->setFormat($format);
        $obj->set($string);
        $this->assertSame($obj->get(), $string);
    }
    
    /**
     *  @dataProvider invalidFormatProvider
     */
    public function testConstructorSetInvalidFormat($string, $format)
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new \XModule\DataWrappers\XString('', $format);
        $obj->set($string);
        $this->assertSame($obj->get(), $string);
    }
    
    
    
    
    public function validFormatProvider()
    {
        return [
            // colors
            ['#000000', '/^#[0-9a-f]{6}$/'],
            ['#458a47', '/^#[0-9a-f]{6}$/'],
            ['#abcdef', '/^#[0-9a-f]{6}$/'],
            // phone numbers (see regexlib.com/REDetails.aspx?regexp_id=22)
            ['800-555-5555', '/^[2-9]\d{2}-\d{3}-\d{4}$/'],
            ['333-444-5555', '/^[2-9]\d{2}-\d{3}-\d{4}$/'],
            ['212-666-1234', '/^[2-9]\d{2}-\d{3}-\d{4}$/'],
            // email addresses (see http://regexlib.com/REDetails.aspx?regexp_id=16)
            ['joe@aol.com', '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            ['ssmith@aspalliance.com', '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            ['a@b.cc', '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
        ];
    }
    
    public function invalidFormatProvider()
    {
        return [
            // colors
            ['#00000g', '/^#[0-9a-f]{6}$/'],
            ['#458a470', '/^#[0-9a-f]{6}$/'],
            ['#abcdefa', '/^#[0-9a-f]{6}$/'],
            // phone numbers (see regexlib.com/REDetails.aspx?regexp_id=22)
            ['000-000-0000', '/^[2-9]\d{2}-\d{3}-\d{4}$/'],
            ['123-456-7890', '/^[2-9]\d{2}-\d{3}-\d{4}$/'],
            ['2126661234', '/^[2-9]\d{2}-\d{3}-\d{4}$/'],
            // email addresses (see http://regexlib.com/REDetails.aspx?regexp_id=16)
            ['joe@123aspx.com', '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            ['joe@web.info', '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            ['joe@company.co.uk', '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
        ];
    }
}