<?php

require_once(__DIR__.'/../../src/Helpers/Row.php');
require_once(__DIR__.'/../../src/Helpers/Cell.php');

use PHPUnit\Framework\TestCase;

class RowTest extends TestCase{
    public static $obj;
    
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Helpers\Row();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('link', \XModule\Helpers\Row::class);
        $this->assertInstanceOf(Link::class, self::$obj->link);
    }
    
    
    // test returning full array (no values)
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertEmpty(self::$obj->get(), '$items is not empty');
    }
    
    /**
     *  @dataProvider addSingleProvider
     *  @depends testGetEmpty
     */
    public function testAddSingle($item)
    {
        self::$obj = new \XModule\Helpers\Row();
        self::$obj->add($item);
        $this->assertSame($item, self::$obj->get(0));
    }
    public function addSingleProvider(){
        return [
            [new \XModule\Helpers\Cell()],
        ];
    }
    
    /**
     *  @dataProvider addArrayProvider
     *  @depends testGetEmpty
     */
    public function testAddArray($items)
    {
        self::$obj = new \XModule\Helpers\Row();
        self::$obj->add($items);
        $this->assertSame($items[0], self::$obj->get(0));
    }
    public function addArrayProvider(){
        return [
            [
                [new \XModule\Helpers\Cell(), new \XModule\Helpers\Cell(), new \XModule\Helpers\Cell()]
            ]
        ];
    }
    
    /**
     *  test returning full array (with values)
     *  @depends testAddArray
     */
    public function testGetFull()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$items is not empty');
        
        $expectedCount = count($this->addArrayProvider()[0][0]);
        
        $this->assertCount( $expectedCount, self::$obj->get());
    }
    
    /**
     *  Test getting each single element
     *  @depends testAddArray
     */
    public function testGetSingle()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$items is not empty');
        
        $this->assertIsObject(self::$obj->get(0));
    }
    
    /**
     *  Test deleting an element from the back of array
     *  @depends testGetSingle
     *  @depends testGetFull
     */
    public function testDeleteBack()
    {
        $countBefore = count(self::$obj->get());
        $backBefore = $countBefore - 1;
        
        self::$obj->delete($backBefore);
        
        $this->assertSame($countBefore - 1, count(self::$obj->get()));
        $this->assertNull(self::$obj->get($backBefore));
    }
    
    /**
     *  Test deleting an element from the front of array
     *  @depends testDeleteBack
     */
    public function testDeleteFront()
    {
        $countBefore = count(self::$obj->get());
        
        self::$obj->delete(0);
        
        $this->assertSame($countBefore - 1, count(self::$obj->get()));
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new \XModule\Helpers\Row();
        $obj->add([453, 'string', new \Link()]);
    }
    
}