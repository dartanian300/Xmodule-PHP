<?php

require_once(__DIR__.'/../src/LoadingIndicator.php');

use PHPUnit\Framework\TestCase;

class LoadingIndicatorTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new LoadingIndicator();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('label', LoadingIndicator::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->label);
        
        $this->assertClassHasAttribute('hidden', LoadingIndicator::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->hidden);
    }
    
}