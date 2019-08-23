<?php

require_once(__DIR__.'/../../../src/GoogleMaps/MapPoint/Icon.php');

use PHPUnit\Framework\TestCase;

class IconTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\GoogleMaps\MapPoint\Icon();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('url', \XModule\GoogleMaps\MapPoint\Icon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\URL::class, self::$obj->url);
        
        $this->assertClassHasAttribute('scale', \XModule\GoogleMaps\MapPoint\Icon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Scale::class, self::$obj->scale);
        
        $this->assertClassHasAttribute('size', \XModule\GoogleMaps\MapPoint\Icon::class);
        $this->assertInstanceOf(\XModule\GoogleMaps\MapPoint\Size::class, self::$obj->size);
        
        $this->assertClassHasAttribute('anchor', \XModule\GoogleMaps\MapPoint\Icon::class);
        $this->assertInstanceOf(\XModule\GoogleMaps\MapPoint\Anchor::class, self::$obj->anchor);
    } 
}