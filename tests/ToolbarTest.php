<?php
use PHPUnit\Framework\TestCase;

class ToolbarTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Toolbar();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('left', Toolbar::class);
        $this->assertClassHasAttribute('middle', Toolbar::class);
        $this->assertClassHasAttribute('right', Toolbar::class);
    }
    
    public function addSingleProvider(){
        return [
            [new \XModule\Toolbar\ToolbarButton()],
            [new \XModule\Toolbar\ToolbarLabel()],
            [new \XModule\Toolbar\ToolbarMenu()],
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
    
}