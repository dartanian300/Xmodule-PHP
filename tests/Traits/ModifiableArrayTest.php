<?php

require_once(__DIR__.'/../../src/Traits/ModifiableArray.php');
require_once(__DIR__.'/../../src/Container.php');
require_once(__DIR__.'/../../src/Detail.php');
require_once(__DIR__.'/../../src/Heading.php');

use PHPUnit\Framework\TestCase;

class ModifiableArrayTest extends TestCase{
    public static $obj;
    
    public static function setUpBeforeClass(): void
    {
        self::makeNew();
    }
    
    public static function makeNew()
    {
        self::$obj = new MA();
    }
    
    // test returning full array (no values)
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$content is not iterable');
        $this->assertEmpty(self::$obj->get(), '$content is not empty');
    }
    
    /**
     *  @dataProvider addSingleProvider
     *  @depends testGetEmpty
     */
    public function testAddSingle($item)
    {
        self::makeNew();
        self::$obj->add($item);
        $this->assertSame($item, self::$obj->get(0));
    }
    public function addSingleProvider(){
        return [
            [new Container()],
        ];
    }
    
    /**
     *  @dataProvider addArrayProvider
     *  @depends testGetEmpty
     */
    public function testAddArray($items)
    {
        self::makeNew();
        self::$obj->add($items);
        
        
//        $i = 0;
        foreach($items as $key => $item){
            $this->assertSame($item, self::$obj->get($key));
            $i++;
        }
    }
    public function addArrayProvider(){
        return [
            [
                [new Container(), new Detail(), new Container()]
            ]
        ];
    }
    
    /**
     *  test returning full array (with values)
     *  @depends testAddArray
     */
    public function testGetFull()
    {
        $this->assertIsIterable(self::$obj->get(), '$content is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$content is not empty');
        
        $expectedCount = count($this->addArrayProvider()[0][0]);
        
        $this->assertCount( $expectedCount, self::$obj->get());
    }
    
    /**
     *  Test getting each single element
     *  @depends testAddArray
     */
    public function testGetSingleFront()
    {
        $this->assertIsIterable(self::$obj->get(), '$content is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$content is not empty');
        
        $this->assertIsObject(self::$obj->get(0));
    }
    
    /**
     *  Test getting the last element
     *  @depends testAddArray
     */
    public function testGetSingleBack()
    {
        $this->assertIsIterable(self::$obj->get(), '$content is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$content is not empty');
        
        $r = self::$obj->get(-1);
        $this->assertIsObject($r);
        $expected = $this->addArrayProvider()[0][0];
        $expected = end($expected);
        $this->assertInstanceOf(get_class($expected), $r);
    }
    
    /**
     *  Test deleting an element from the back of array
     *  @depends testGetSingleFront
     *  @depends testGetSingleBack
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
        self::$obj->add([453, 'string', new Heading()]);
    }
    
}




/*
 *  Define class to test with
 *  Allow only 'Container' and 'Detail' objects
 */
class MA {
    use \ModifiableArray;
    
    private $content;
    
    public function __construct()
    {
        $this->content = array();
    }

    public function add($item)
    {
        $this->addArray('content', $item, array('Container', 'Detail'));
    }
    
    public function get($position = null)
    {
        return $this->getArray('content', $position);
    }
    
    public function delete($position)
    {
        $this->deleteArray('content', $position);
    }
}