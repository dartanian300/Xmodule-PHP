<?php
use PHPUnit\Framework\TestCase;

class GoogleMapTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new GoogleMap();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('initialLatitude', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Latitude::class, self::$obj->initialLatitude);
        
        $this->assertClassHasAttribute('initialLongitude', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Longitude::class, self::$obj->initialLongitude);
        
        $this->assertClassHasAttribute('initialZoomLevel', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ZoomLevel::class, self::$obj->initialZoomLevel);
        
        $this->assertClassHasAttribute('disableZoomToPlacemarks', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->disableZoomToPlacemarks);
        
        $this->assertClassHasAttribute('defaultToUserLocated', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->defaultToUserLocated);
        
        $this->assertClassHasAttribute('minZoomLevel', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ZoomLevel::class, self::$obj->minZoomLevel);
        
        $this->assertClassHasAttribute('maxZoomLevel', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ZoomLevel::class, self::$obj->maxZoomLevel);
        
        $this->assertClassHasAttribute('aspectRatio', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\AspectRatio::class, self::$obj->aspectRatio);
        
        $this->assertClassHasAttribute('inset', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->inset);
        
        $this->assertClassHasAttribute('showUserLocationButton', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->showUserLocationButton);
        
        $this->assertClassHasAttribute('showRecenterButton', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->showRecenterButton);
        
        $this->assertClassHasAttribute('showZoomButtons', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->showZoomButtons);
        
        $this->assertClassHasAttribute('baseLayers', GoogleMap::class);
        $this->assertInstanceOf(\XModule\DataWrappers\BaseLayers::class, self::$obj->baseLayers);
        
        $this->assertClassHasAttribute('staticPlacemarks', GoogleMap::class);
        $this->assertClassHasAttribute('dynamicPlacemarks', GoogleMap::class);
    }
    
    // Make sure get is returning an empty array
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$staticPlacemarks is not iterable');
        $this->assertEmpty(self::$obj->get(), '$staticPlacemarks is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProvider
     *  @depends testGetEmpty
     */
    public function testAddGet($item)
    {
        self::$obj->add($item);
        $this->assertSame($item, self::$obj->get(0), 'add() and get() do not modify the same property');
    }
    public function addSingleProvider(){
        return [
            [new \XModule\GoogleMaps\MapPoint()],
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