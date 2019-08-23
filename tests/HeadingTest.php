<?php

require_once(__DIR__.'/../src/Heading.php');

use PHPUnit\Framework\TestCase;

class HeadingTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Heading();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', Heading::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('description', Heading::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Description::class, self::$obj->description);
        
        $this->assertClassHasAttribute('inset', Heading::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->inset);
    }
    
}