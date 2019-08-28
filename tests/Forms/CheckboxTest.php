<?php
use PHPUnit\Framework\TestCase;

class CheckboxTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Checkbox();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('checked', Checkbox::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->checked);
        
        $this->assertClassHasAttribute('progressiveDisclosureItems', Checkbox::class);
        $this->assertInstanceOf(\XModule\Helpers\ProgressiveDisclosureItems::class, self::$obj->progressiveDisclosureItems);
    }

}