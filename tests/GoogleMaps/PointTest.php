<?php
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\GoogleMaps\Point();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('latitude', \XModule\GoogleMaps\Point::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Latitude::class, self::$obj->latitude);
        
        $this->assertClassHasAttribute('longitude', \XModule\GoogleMaps\Point::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Longitude::class, self::$obj->longitude);
    } 
}