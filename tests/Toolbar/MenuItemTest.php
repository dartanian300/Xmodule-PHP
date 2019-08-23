<?php

require_once(__DIR__.'/../../src/Toolbar/MenuItem.php');

use PHPUnit\Framework\TestCase;

class MenuItemTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\Toolbar\MenuItem();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\Toolbar\MenuItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('selected', \XModule\Toolbar\MenuItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->selected);
        
        $this->assertClassHasAttribute('link', \XModule\Toolbar\MenuItem::class);
        $this->assertInstanceOf(Link::class, self::$obj->link);
        
        $this->assertClassHasAttribute('ajaxRelativePath', \XModule\Toolbar\MenuItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->ajaxRelativePath);
    } 
}