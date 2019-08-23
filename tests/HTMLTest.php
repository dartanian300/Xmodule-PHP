<?php

require_once(__DIR__.'/../src/HTML.php');

use PHPUnit\Framework\TestCase;

class HTMLTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new HTML();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('html', HTML::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->html);
        
        $this->assertClassHasAttribute('focal', HTML::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->focal);
        
        $this->assertClassHasAttribute('inset', HTML::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->inset);
    }
    
}