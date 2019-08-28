<?php
use PHPUnit\Framework\TestCase;

class ToolbarLabelTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Toolbar\ToolbarLabel();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('label', \XModule\Toolbar\ToolbarLabel::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->label);
    } 
}