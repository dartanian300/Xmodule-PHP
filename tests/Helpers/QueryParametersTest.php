<?php
use PHPUnit\Framework\TestCase;

class QueryParametersTest extends TestCase{
    public static $obj;
    
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Helpers\QueryParameters();
    }
    
    
    // test returning full array (no values)
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertEmpty(self::$obj->get(), '$items is not empty');
    }
    
    /**
     *  @dataProvider addProvider
     *  @depends testGetEmpty
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
     *  Test returning full array (with values)
     *  @depends testAdd
     */
    public function testGetFull()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$items is not empty');
        
        $expectedCount = count($this->addProvider());
        
        $this->assertCount( $expectedCount, self::$obj->get());
    }
    
    /**
     *  Test getting each single element
     *  @depends testAdd
     */
    public function testGetSingle()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertNotEmpty(self::$obj->get(), '$items is not empty');
        
        $key = $this->addProvider()[0][0];
        
        $this->assertIsString(self::$obj->get($key));
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
        
        $this->expectException(OutOfBoundsException::class);
        $this->assertNull(self::$obj->get($key));
    }
    
}