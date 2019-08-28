<?php
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Phone();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('placeholder', Phone::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->placeholder);
    }

}