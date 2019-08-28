<?php
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Image();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('url', Image::class);
        $this->assertInstanceOf(\XModule\DataWrappers\URL::class, self::$obj->url);
        
        $this->assertClassHasAttribute('alt', Image::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Alt::class, self::$obj->alt);
        
        $this->assertClassHasAttribute('scaleToFull', Image::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->scaleToFull);
        
        $this->assertClassHasAttribute('enableZoomControls', Image::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->enableZoomControls);
    }
    
}