<?php

require_once(__DIR__.'/../../src/Forms/FormButton.php');

use PHPUnit\Framework\TestCase;

class FormButtonTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new FormButton();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', FormButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, self::$obj->title);
        
        $this->assertClassHasAttribute('buttonType', FormButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ButtonType::class, self::$obj->buttonType);
        
        $this->assertClassHasAttribute('accessoryIcon', FormButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\AccessoryIcon::class, self::$obj->accessoryIcon);
        
        $this->assertClassHasAttribute('accessoryIconPosition', FormButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\AccessoryIconPosition::class, self::$obj->accessoryIconPosition);
        
        $this->assertClassHasAttribute('actionType', FormButton::class);
        $this->assertInstanceOf(\XModule\DataWrappers\ActionType::class, self::$obj->actionType);
    }

}