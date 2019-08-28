<?php
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Form();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('relativePath', Form::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->relativePath);
        
        $this->assertClassHasAttribute('requestMethod', Form::class);
        $this->assertInstanceOf(\XModule\DataWrappers\RequestMethod::class, self::$obj->requestMethod);
        
        $this->assertClassHasAttribute('postType', Form::class);
        $this->assertInstanceOf(\XModule\DataWrappers\PostType::class, self::$obj->postType);
        
        $this->assertClassHasAttribute('heading', Form::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->heading);
        
        $this->assertClassHasAttribute('disableScrim', Form::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->disableScrim);
        
        $this->assertClassHasAttribute('loadingTitle', Form::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->loadingTitle);
        
        $this->assertClassHasAttribute('events', Form::class);
        $this->assertInstanceOf(Events::class, self::$obj->events);
        
        $this->assertClassHasAttribute('items', Form::class);
    }
    
    // Make sure get is returning an empty array
    public function testGetEmpty()
    {
        $this->assertIsIterable(self::$obj->get(), '$items is not iterable');
        $this->assertEmpty(self::$obj->get(), '$items is not empty');
    }
    
    /**
     *  Test both add() and get() (valid options)
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
            [new Checkbox()],
            [new Email()],
            [new HiddenField()],
            [new Label()],
            [new Password()],
            [new Phone()],
            [new RadioButtons()],
            [new SelectMenu()],
            [new TextInput()],
            [new TextArea()],
            [new Upload()],
            [new Heading()],
            [new HTML()],
            [new Image()],
            [new Table()],
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