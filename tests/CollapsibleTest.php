<?php

require_once(__DIR__.'/../src/Collapsible.php');
require_once(__DIR__.'/../src/Forms/Form.php');
require_once(__DIR__.'/../src/ButtonContainer.php');
require_once(__DIR__.'/../src/Heading.php');
require_once(__DIR__.'/../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class CollapsibleTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Collapsible();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', Collapsible::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('collapsed', Collapsible::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->collapsed);
        
        $this->assertClassHasAttribute('disclosureIcon', Collapsible::class);
        $this->assertInstanceOf(\XModule\DataWrappers\DisclosureIcon::class, self::$obj->disclosureIcon);
        
        $this->assertClassHasAttribute('content', Collapsible::class);
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