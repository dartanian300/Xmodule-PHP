<?php
use PHPUnit\Framework\TestCase;

class LinkButtonTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new LinkButton();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', LinkButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('link', LinkButton::class);
        $this->assertInstanceOf(Link::class, self::$obj->link);
        
        $this->assertClassHasAttribute('disabled', LinkButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->disabled);
        
        $this->assertClassHasAttribute('accessoryIconPosition', LinkButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\AccessoryIconPosition::class, self::$obj->accessoryIconPosition);
        
        $this->assertClassHasAttribute('actionType', LinkButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ActionType::class, self::$obj->actionType);
        
        $this->assertClassHasAttribute('events', LinkButton::class);
        $this->assertInstanceOf(Events::class, self::$obj->events);
    }
    
}