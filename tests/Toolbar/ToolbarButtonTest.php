<?php

require_once(__DIR__.'/../../src/Toolbar/ToolbarButton.php');

use PHPUnit\Framework\TestCase;

class ToolbarButtonTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Toolbar\ToolbarButton();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\Toolbar\ToolbarButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('link', \XModule\Toolbar\ToolbarButton::class);
        $this->assertInstanceOf(Link::class, self::$obj->link);
        
        $this->assertClassHasAttribute('accessoryIconPosition', \XModule\Toolbar\ToolbarButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\AccessoryIconPosition::class, self::$obj->accessoryIconPosition);
        
        $this->assertClassHasAttribute('actionType', \XModule\Toolbar\ToolbarButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ActionType::class, self::$obj->actionType);
    } 
}