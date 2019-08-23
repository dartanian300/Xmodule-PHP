<?php

require_once(__DIR__.'/../src/MultiColumn.php');

use PHPUnit\Framework\TestCase;

class MultiColumnTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new MultiColumn();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('columns', MultiColumn::class);
        $this->assertClassHasAttribute('numColumns', MultiColumn::class);
    }
    
    public function testInitialNumColumns()
    {
        $this->assertSame(1, self::$obj->getNumColumns());
    }
    
    /**
     *  @depends testInitialNumColumns
     */
    public function testSetNumColumns()
    {
        $newNum = 5;
        self::$obj->setNumColumns($newNum);
        $this->assertSame($newNum, self::$obj->getNumColumns());
    }
    
    /**
     *  @dataProvider addingColumnsProvider
     *  @depends testSetNumColumns
     */
    public function testAddingColumns($column, $data)
    {
        $index = self::$obj->add($column, $data);
        $this->assertSame($data, self::$obj->get($column, $index));
    }
    public function addingColumnsProvider(){
        return [
            [0, "a"],
            [0, "b"],
            [0, "c"],
            [0, "d"],
            [0, "e"],
            
            [1, "a"],
            [1, "b"],
            [1, "c"],
            [1, "d"],
            [1, "e"],
            
            [2, "a"],
            [2, "b"],
            [2, "c"],
            [2, "d"],
            [2, "e"],
            
            [3, "a"],
            [3, "b"],
            [3, "c"],
            [3, "d"],
            [3, "e"],
            
            [4, "a"],
            [4, "b"],
            [4, "c"],
            [4, "d"],
            [4, "e"],
        ];
    }
    
    /**
     *  @dataProvider dataProvider
     *  @depends testSetNumColumns
     */
    public function testAddingInvalidColumns($column, $data)
    {
        $this->expectException(OutOfBoundsException::class);
        self::$obj->add($column, $data);
    }
    public function dataProvider(){
        return [
            [5, 'a'],
            [6, 'b'],
            [-1, 'c'],
            [-5, 'd'],
        ];
    }
}