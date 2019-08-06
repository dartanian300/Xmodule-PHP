<?php

require_once(__DIR__.'/../../src/Helpers/Tab.php');

// includes for testing valid input types
require_once(__DIR__.'/../../src/ButtonContainer.php');
require_once(__DIR__.'/../../src/Collapsible.php');
require_once(__DIR__.'/../../src/Container.php');
require_once(__DIR__.'/../../src/Detail.php');
require_once(__DIR__.'/../../src/Grid.php');
require_once(__DIR__.'/../../src/Heading.php');
require_once(__DIR__.'/../../src/HTML.php');
require_once(__DIR__.'/../../src/Image.php');
require_once(__DIR__.'/../../src/LinkButton.php');
require_once(__DIR__.'/../../src/XList.php');
require_once(__DIR__.'/../../src/Table.php');
require_once(__DIR__.'/../../src/Tabs.php');
require_once(__DIR__.'/../../src/Forms/Form.php');

use PHPUnit\Framework\TestCase;

class TabTest extends TestCase{
    public static $obj;
    
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Helpers\Tab();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\Helpers\Tab::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
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
        self::$obj = new \XModule\Helpers\Tab();
        self::$obj->add($item);
        $this->assertSame($item, self::$obj->get(0));
    }
    public function addSingleProvider(){
        return [
            [new ButtonContainer()],
            [new Collapsible()],
            [new Container()],
            [new Detail()],
            [new Heading()],
            [new HTML()],
            [new Image()],
            [new XList()],
            [new Table()],
            [new Tabs()],
            [new Form()]
        ];
    }
    
    /**
     *  @dataProvider addArrayProvider
     *  @depends testGetEmpty
     */
    public function testAddArray($items)
    {
        self::$obj = new \XModule\Helpers\Tab();
        self::$obj->add($items);
        $this->assertSame($items[0], self::$obj->get(0));
    }
    public function addArrayProvider(){
        return [
            [
                [new ButtonContainer(), new Collapsible(), new Container(), new Detail(), new Heading(), new HTML(), new Image(), new XList(), new Table(), new Tabs(), new Form()]
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
        $obj = new \XModule\Helpers\Tab();
        $obj->add([453, 'string', new \Link(), new Grid(), new LinkButton()]);
    }
}