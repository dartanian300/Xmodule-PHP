<?php

require_once(__DIR__.'/../../src/GoogleMaps/MapPolygon.php');
require_once(__DIR__.'/../../src/Helpers/CarouselItem.php');
require_once(__DIR__.'/../../src/GoogleMaps/Point.php');

use PHPUnit\Framework\TestCase;

class MapPolygonTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\GoogleMaps\MapPolygon();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('description', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Description::class, self::$obj->description);
        
        $this->assertClassHasAttribute('link', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(Link::class, self::$obj->link);
        
        $this->assertClassHasAttribute('lineColor', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Color::class, self::$obj->lineColor);
        
        $this->assertClassHasAttribute('lineAlpha', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Alpha::class, self::$obj->lineAlpha);
        
        $this->assertClassHasAttribute('lineWidth', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\LineWidth::class, self::$obj->lineWidth);
        
        $this->assertClassHasAttribute('fillColor', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Color::class, self::$obj->fillColor);
        
        $this->assertClassHasAttribute('fillAlpha', \XModule\GoogleMaps\MapPolygon::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Alpha::class, self::$obj->fillAlpha);
        
        $this->assertClassHasAttribute('polygon', \XModule\GoogleMaps\MapPolygon::class);
    }
    
    // Make sure get is returning an empty array
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$polygon is not iterable');
        $this->assertEmpty(self::$obj->get(), '$polygon is not empty');
    }
    
    /**
     *  Test both add() and get() (valid options)
     *  @dataProvider addSingleProvider
     *  @depends testGetEmpty
     */
    public function testAddGet($item)
    {
        self::$obj->add($item);
        $this->assertSame($item, self::$obj->get(-1), 'add() and get() do not modify the same property');
    }
    public function addSingleProvider(){
        return [
            [new \XModule\GoogleMaps\Point()],
        ];
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->add([453, 'string', new \XModule\Helpers\CarouselItem()]);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGet
     */
    public function testDelete()
    {
        $countBefore = count(self::$obj->get());
        
        self::$obj->delete($countBefore - 1);
        
        $countAfter = count(self::$obj->get());
        $this->assertSame($countBefore - 1, $countAfter, 'delete() did not remove the correct number of elements');
    }
    
}