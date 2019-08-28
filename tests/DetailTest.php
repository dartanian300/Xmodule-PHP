<?php
use PHPUnit\Framework\TestCase;

class DetailTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Detail();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', Detail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('subtitle', Detail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->subtitle);
        
        $this->assertClassHasAttribute('body', Detail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->body);
        
        $this->assertClassHasAttribute('thumbnail', Detail::class);
        $this->assertInstanceOf(\XModule\Helpers\Thumbnail::class, self::$obj->thumbnail);
        
        $this->assertClassHasAttribute('content', Detail::class);
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