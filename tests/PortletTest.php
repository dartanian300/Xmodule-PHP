<?php
use PHPUnit\Framework\TestCase;

class PortletTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Portlet();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('navbarTitle', Portlet::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->navbarTitle);
        
        $this->assertClassHasAttribute('navbarIcon', Portlet::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->navbarIcon);
        
        $this->assertClassHasAttribute('navbarLink', Portlet::class);
        $this->assertInstanceOf(Link::class, self::$obj->navbarLink);
        
        $this->assertClassHasAttribute('forceAjaxOnLoad', Portlet::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->forceAjaxOnLoad);
        
        $this->assertClassHasAttribute('height', Portlet::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Size::class, self::$obj->height);
        
        $this->assertClassHasAttribute('content', Portlet::class);
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
            [new Carousel()],
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