<?php

require_once(__DIR__.'/../src/XList.php');
require_once(__DIR__.'/../src/Helpers/ListItem.php');
require_once(__DIR__.'/../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class XListTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new XList();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('heading', XList::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->heading);
        
        $this->assertClassHasAttribute('grouped', XList::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->grouped);
        
        $this->assertClassHasAttribute('items', XList::class);
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
            [new \XModule\Helpers\ListItem()],
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