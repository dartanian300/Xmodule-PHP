<?php
use PHPUnit\Framework\TestCase;

class ProgressiveDisclosureItemsTest extends TestCase{
    public static $obj;
    
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Helpers\ProgressiveDisclosureItems();
    }
    
    // test returning full array (no values)
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertEmpty(self::$obj->get(), '$items is not empty');
    }
    
    /**
     *  @dataProvider addProvider
     */
    public function testAdd($key, $value)
    {
        self::$obj->add($key, $value);
        $this->assertSame($value, self::$obj->get($key));
    }
    public function addProvider(){
        return [
            ['hello', 'goodbye'],
            ['welcome', 'get out'],
            ['up', 'down'],
            ['Is a tree', 'Is not a tree'],
            ['boolean', true],
            ['falseBoolean', false],
            ['arr', array()],
            ['arr2', array('I have a value')],
            ['number', 563]
        ];
    }
    
    /**
     *  test returning full array (with values)
     *  @depends testAdd
     */
    public function testGetFull()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$items is not empty');
        $this->assertCount( count($this->addProvider()), self::$obj->get());
    }
    
    /**
     *  Test getting each single element
     *  @depends testAdd
     */
    public function testGetSingle()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$items is not empty');
        
        $data = $this->addProvider();
        
        foreach($data as $args){
            $value = self::$obj->get($args[0]);
            $this->assertSame($args[1], $value);
        }
    }
    
    /**
     *  Test deleting an element
     *  @depends testGetSingle
     *  @depends testGetFull
     */
    public function testDelete()
    {
        $data = $this->addProvider();
        $data = $data[array_rand($data)];
        $key = $data[0];
        $value = $data[1];
        
        $countBefore = count(self::$obj->get());
        
        self::$obj->delete($key);
        
        $this->assertSame($countBefore - 1, count(self::$obj->get()));
        $this->assertNull(self::$obj->get($key));
    }
}