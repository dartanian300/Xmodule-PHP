<?php
use PHPUnit\Framework\TestCase;

class MapSizeTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\GoogleMaps\MapPoint\Size();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('width', \XModule\GoogleMaps\MapPoint\Size::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Width::class, self::$obj->width);
        
        $this->assertClassHasAttribute('height', \XModule\GoogleMaps\MapPoint\Size::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Height::class, self::$obj->height);
    } 
}