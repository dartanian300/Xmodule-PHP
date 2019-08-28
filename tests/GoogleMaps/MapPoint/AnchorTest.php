<?php
use PHPUnit\Framework\TestCase;

class AnchorTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\GoogleMaps\MapPoint\Anchor();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('x', \XModule\GoogleMaps\MapPoint\Anchor::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Number::class, self::$obj->x);
        
        $this->assertClassHasAttribute('y', \XModule\GoogleMaps\MapPoint\Anchor::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Number::class, self::$obj->y);
    } 
}