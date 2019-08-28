<?php
use PHPUnit\Framework\TestCase;

class TextInputTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new TextInput();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('placeholder', TextInput::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->placeholder);
    }

}