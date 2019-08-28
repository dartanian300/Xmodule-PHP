<?php
use PHPUnit\Framework\TestCase;

class DataWrapperImageTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\DataWrappers\Image();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('badge', \XModule\DataWrappers\Image::class);
        $this->assertInstanceOf(\XModule\Helpers\Badge::class, self::$obj->badge);
    }
    
}