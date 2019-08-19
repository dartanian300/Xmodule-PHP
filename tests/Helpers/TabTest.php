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
        
        $this->assertClassHasAttribute('content', \XModule\Helpers\Tab::class);
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
        $this->assertSame($item, self::$obj->get(-1), 'add() and get() do not modify the same property');
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
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->add([453, 'string', new \Link(), new Grid(), new LinkButton()]);
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