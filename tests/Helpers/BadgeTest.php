<?php

require_once(__DIR__.'/../../src/Helpers/Badge.php');

use PHPUnit\Framework\TestCase;

class BadgeTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\Badge();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('value', \XModule\Helpers\Badge::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->value);
        
        $this->assertClassHasAttribute('descriptor', \XModule\Helpers\Badge::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->descriptor);
        
        $this->assertClassHasAttribute('size', \XModule\Helpers\Badge::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Size::class, $this->obj->size);
    }
}