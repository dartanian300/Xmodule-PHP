<?php

require_once(__DIR__.'/../src/ToolbarContent.php');
require_once(__DIR__.'/../src/Toolbar/ToolbarButton.php');
require_once(__DIR__.'/../src/Toolbar/ToolbarLabel.php');
require_once(__DIR__.'/../src/Toolbar/MenuItem.php');
require_once(__DIR__.'/../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class ToolbarContentTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new ToolbarContent();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('menuPosition', ToolbarContent::class);
        $this->assertInstanceOf(\XModule\DataWrappers\MenuPosition::class, self::$obj->menuPosition);
        
        $this->assertClassHasAttribute('ajaxUpdateInterval', ToolbarContent::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Number::class, self::$obj->ajaxUpdateInterval);
        
        $this->assertClassHasAttribute('menuItems', ToolbarContent::class);
        $this->assertClassHasAttribute('left', ToolbarContent::class);
        $this->assertClassHasAttribute('middle', ToolbarContent::class);
        $this->assertClassHasAttribute('right', ToolbarContent::class);
    }
    
    public function addSingleProvider(){
        return [
            [new \XModule\Toolbar\ToolbarButton()],
            [new \XModule\Toolbar\ToolbarLabel()],
        ];
    }
    public function addInvalidProvider(){
        return [
            [453, 'string', new \XModule\Helpers\CarouselItem()],
        ];
    }
    
    // Make sure get is returning an empty array
    public function testGetEmptyLeft()
    {
        $this->assertIsIterable(self::$obj->getLeft(), '$left is not iterable');
        $this->assertEmpty(self::$obj->getLeft(), '$left is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProvider
     *  @depends testGetEmptyLeft
     */
    public function testAddGetLeft($item)
    {
        self::$obj->addLeft($item);
        $this->assertSame($item, self::$obj->getLeft(-1), 'addLeft() and getLeft() do not modify the same property');
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     *  @dataProvider addInvalidProvider
     */
    public function testAddInvalidLeft($item)
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addLeft($item);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetLeft
     */
    public function testDeleteLeft()
    {
        $countBefore = count(self::$obj->getLeft());
        
        self::$obj->deleteLeft($countBefore - 1);
        
        $countAfter = count(self::$obj->getLeft());
        $this->assertSame($countBefore - 1, $countAfter, 'deleteLeft() did not remove the correct number of elements');
    }
    
    
    
    
    // Make sure get is returning an empty array
    public function testGetEmptyMiddle()
    {
        $this->assertIsIterable(self::$obj->getMiddle(), '$middle is not iterable');
        $this->assertEmpty(self::$obj->getMiddle(), '$middle is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProvider
     *  @depends testGetEmptyMiddle
     */
    public function testAddGetMiddle($item)
    {
        self::$obj->addMiddle($item);
        $this->assertSame($item, self::$obj->getMiddle(-1), 'addMiddle() and getMiddle() do not modify the same property');
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     *  @dataProvider addInvalidProvider
     */
    public function testAddInvalidMiddle($item)
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addMiddle($item);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetMiddle
     */
    public function testDeleteMiddle()
    {
        $countBefore = count(self::$obj->getMiddle());
        
        self::$obj->deleteMiddle($countBefore - 1);
        
        $countAfter = count(self::$obj->getMiddle());
        $this->assertSame($countBefore - 1, $countAfter, 'deleteMiddle() did not remove the correct number of elements');
    }
    
    
    
    
    // Make sure get is returning an empty array
    public function testGetEmptyRight()
    {
        $this->assertIsIterable(self::$obj->getRight(), '$right is not iterable');
        $this->assertEmpty(self::$obj->getRight(), '$right is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProvider
     *  @depends testGetEmptyRight
     */
    public function testAddGetRight($item)
    {
        self::$obj->addRight($item);
        $this->assertSame($item, self::$obj->getRight(-1), 'addRight() and getRight() do not modify the same property');
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     *  @dataProvider addInvalidProvider
     */
    public function testAddInvalidRight($item)
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addRight($item);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetRight
     */
    public function testDeleteRight()
    {
        $countBefore = count(self::$obj->getRight());
        
        self::$obj->deleteRight($countBefore - 1);
        
        $countAfter = count(self::$obj->getRight());
        $this->assertSame($countBefore - 1, $countAfter, 'deleteRight() did not remove the correct number of elements');
    }
    
    
    
    
    // Make sure get is returning an empty array
    public function testGetEmptyMenuItem()
    {
        $this->assertIsIterable(self::$obj->getMenuItem(), '$menuItem is not iterable');
        $this->assertEmpty(self::$obj->getMenuItem(), '$menuItem is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addProviderMenuItem
     *  @depends testGetEmptyMenuItem
     */
    public function testAddGetMenuItem($item)
    {
        self::$obj->addMenuItem($item);
        $this->assertSame($item, self::$obj->getMenuItem(-1), 'addMenuItem() and getMenuItem() do not modify the same property');
    }
    public function addProviderMenuItem(){
        return [
            [new \XModule\Toolbar\MenuItem()],
        ];
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     *  @dataProvider addInvalidProvider
     */
    public function testAddInvalidMenuItem($item)
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addMenuItem($item);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetMenuItem
     */
    public function testDeleteMenuItem()
    {
        $countBefore = count(self::$obj->getMenuItem());
        
        self::$obj->deleteMenuItem($countBefore - 1);
        
        $countAfter = count(self::$obj->getMenuItem());
        $this->assertSame($countBefore - 1, $countAfter, 'deleteMenuItem() did not remove the correct number of elements');
    }
    
}