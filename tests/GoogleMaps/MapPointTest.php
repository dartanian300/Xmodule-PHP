<?php
use PHPUnit\Framework\TestCase;

class MapPointTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\GoogleMaps\MapPoint();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('point', \XModule\GoogleMaps\MapPoint::class);
        $this->assertInstanceOf(\XModule\GoogleMaps\Point::class, self::$obj->point);
        
        $this->assertClassHasAttribute('title', \XModule\GoogleMaps\MapPoint::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('description', \XModule\GoogleMaps\MapPoint::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Description::class, self::$obj->description);
        
        $this->assertClassHasAttribute('link', \XModule\GoogleMaps\MapPoint::class);
        $this->assertInstanceOf(Link::class, self::$obj->link);
        
        $this->assertClassHasAttribute('icon', \XModule\GoogleMaps\MapPoint::class);
        $this->assertInstanceOf(\XModule\GoogleMaps\MapPoint\Icon::class, self::$obj->icon);
    } 
}