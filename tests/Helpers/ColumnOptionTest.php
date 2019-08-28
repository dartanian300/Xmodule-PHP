<?php
use PHPUnit\Framework\TestCase;

class ColumnOptionTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\ColumnOption();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('header', \XModule\Helpers\ColumnOption::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->header);
        
        $this->assertClassHasAttribute('width', \XModule\Helpers\ColumnOption::class);
        $this->assertInstanceOf(\XModule\DataWrappers\StringWidth::class, $this->obj->width);
        
        $this->assertClassHasAttribute('verticalAlign', \XModule\Helpers\ColumnOption::class);
        $this->assertInstanceOf(\XModule\DataWrappers\VerticalAlignment::class, $this->obj->verticalAlign);
        
        $this->assertClassHasAttribute('horizontalAlign', \XModule\Helpers\ColumnOption::class);
        $this->assertInstanceOf(\XModule\DataWrappers\HorizontalAlignment::class, $this->obj->horizontalAlign);
    }
}