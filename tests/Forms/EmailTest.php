<?php

require_once(__DIR__.'/../../src/Forms/Email.php');

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Email();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('placeholder', Email::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->placeholder);
    }

}