<?php

require_once(__DIR__.'/../src/Container.php');
require_once(__DIR__.'/../src/Forms/Form.php');
require_once(__DIR__.'/../src/ButtonContainer.php');
require_once(__DIR__.'/../src/Heading.php');
require_once(__DIR__.'/../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Container();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('hidden', Container::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->hidden);
        
        $this->assertClassHasAttribute('margins', Container::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Margins::class, self::$obj->margins);
        
        $this->assertClassHasAttribute('content', Container::class);
    }
    
    // Make sure get is returning an empty array
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$content is not iterable');
        $this->assertEmpty(self::$obj->get(), '$content is not empty');
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
            [new Form()],
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