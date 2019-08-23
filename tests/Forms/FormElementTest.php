<?php

require_once(__DIR__.'/../../src/Forms/FormButton.php');

use PHPUnit\Framework\TestCase;

class FormButtonTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new EFormElement();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('name', EFormElement::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Name::class, self::$obj->name);
        
        $this->assertClassHasAttribute('label', EFormElement::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->label);
        
        $this->assertClassHasAttribute('description', EFormElement::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Description::class, self::$obj->description);
        
        $this->assertClassHasAttribute('value', EFormElement::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->value);
        
        $this->assertClassHasAttribute('required', EFormElement::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->required);
        
        $this->assertClassHasAttribute('inputType', EFormElement::class);
    }

}

class EFormElement extends FormElement {
    public function __construct(){
        parent::__construct('test');
    }
}