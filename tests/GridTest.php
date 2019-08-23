<?php

require_once(__DIR__.'/../src/Grid.php');
require_once(__DIR__.'/../src/Helpers/GridItem.php');
require_once(__DIR__.'/../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class GridTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Grid();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('horizontalSpacing', Grid::class);
        $this->assertInstanceOf(\XModule\DataWrappers\HorizontalSpacing::class, self::$obj->horizontalSpacing);
        
        $this->assertClassHasAttribute('horizontalAlignment', Grid::class);
        $this->assertInstanceOf(\XModule\DataWrappers\HorizontalAlignment::class, self::$obj->horizontalAlignment);
        
        $this->assertClassHasAttribute('containerPadding', Grid::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ContainerPadding::class, self::$obj->containerPadding);
        
        $this->assertClassHasAttribute('perItemPadding', Grid::class);
        $this->assertInstanceOf(\XModule\DataWrappers\PerItemPadding::class, self::$obj->perItemPadding);
        
        $this->assertClassHasAttribute('suppressVisibleLabels', Grid::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->suppressVisibleLabels);
        
        $this->assertClassHasAttribute('items', Grid::class);
    }
    
    // Make sure get is returning an empty array
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertEmpty(self::$obj->get(), '$items is not empty');
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
            [new \XModule\Helpers\GridItem()],
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