<?php
use PHPUnit\Framework\TestCase;

class AutoUpdateAccessibilityTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new AutoUpdateAccessibility();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('disclaimerType', AutoUpdateAccessibility::class);
        $this->assertInstanceOf(\XModule\DataWrappers\DisclaimerType::class, $this->obj->disclaimerType);
        
        $this->assertClassHasAttribute('textAlignment', AutoUpdateAccessibility::class);
        $this->assertInstanceOf(\XModule\DataWrappers\TextAlignment::class, $this->obj->textAlignment);
        
        $this->assertClassHasAttribute('inset', AutoUpdateAccessibility::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, $this->obj->inset);
    }
}