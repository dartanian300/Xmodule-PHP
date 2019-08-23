<?php

require_once(__DIR__.'/../src/XModuleResponse.php');
require_once(__DIR__.'/../src/Element.php');
require_once(__DIR__.'/../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class XModuleResponseTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new XModuleResponse();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('metadata', XModuleResponse::class);
        $this->assertClassHasAttribute('content', XModuleResponse::class);
        $this->assertClassHasAttribute('regionContent', XModuleResponse::class);
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
            [new E()],
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


// class to test with
class E extends \Element {
    public function __construct(){
        parent::__construct('test');
    }
}