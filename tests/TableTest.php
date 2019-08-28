<?php
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase{
    public static $obj;
    private static $numCols = 5;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Table();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('heading', Table::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->heading);
        
        $this->assertClassHasAttribute('columnOptions', Table::class);
        $this->assertClassHasAttribute('rows', Table::class);
    }
    
    // make sure number of cols is seen as 0 when empty
    public function testNumColumnsEmpty()
    {
        $this->assertSame(0, self::$obj->getNumColumns());
    }
    
    // Make sure get is returning an empty array
    public function testGetEmptyRow()
    {
        $this->assertIsIterable(self::$obj->getRow(), '$rows is not iterable');
        $this->assertEmpty(self::$obj->getRow(), '$rows is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProviderRow
     *  @depends testGetEmptyRow
     */
    public function testAddGetRow($item)
    {
        self::$obj->addRow($item);
        $this->assertSame($item, self::$obj->getRow(0), 'add() and get() do not modify the same property');
    }
    public function addSingleProviderRow(){
        // gernate a random number of columns
        self::$numCols = rand(0, 23);
        
        // generate a random number of columns
        $row = new \XModule\Helpers\Row();
        for ($i = 0; $i < self::$numCols; $i++){
            $row->add(new \XModule\Helpers\Cell());
        }
        return [
            [$row],
        ];
    }
    
    /**
     *  Make sure getNumColumns() is accurate
     *  @depends testAddGetRow
     */
    public function testNumColumnsFilled()
    {
        $this->assertSame(self::$numCols, self::$obj->getNumColumns());
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalidRow()
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addRow([453, 'string', new \XModule\Helpers\CarouselItem()]);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testNumColumnsFilled
     */
    public function testDeleteRow()
    {
        $countBefore = count(self::$obj->getRow());
        
        self::$obj->deleteRow($countBefore - 1);
        
        $countAfter = count(self::$obj->getRow());
        $this->assertSame($countBefore - 1, $countAfter, 'delete() did not remove the correct number of elements');
    }
    
    
    
    // Make sure get is returning an empty array
    public function testGetEmptyColumnOption()
    {
        $this->assertIsIterable(self::$obj->getColumnOption(), '$columnOptions is not iterable');
        $this->assertEmpty(self::$obj->getColumnOption(), '$columnOptions is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProviderColumnOption
     *  @depends testGetEmptyColumnOption
     */
    public function testAddGetColumnOption($item)
    {
        self::$obj->addColumnOption($item);
        $this->assertSame($item, self::$obj->getColumnOption(0), 'add() and get() do not modify the same property');
    }
    public function addSingleProviderColumnOption(){
        return [
            [new \XModule\Helpers\ColumnOption()],
        ];
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalidColumnOption()
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addColumnOption([453, 'string', new \XModule\Helpers\CarouselItem()]);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetColumnOption
     */
    public function testDeleteColumnOption()
    {
        $countBefore = count(self::$obj->getColumnOption());
        
        self::$obj->deleteColumnOption($countBefore - 1);
        
        $countAfter = count(self::$obj->getColumnOption());
        $this->assertSame($countBefore - 1, $countAfter, 'delete() did not remove the correct number of elements');
    }
    
}