<?php

require_once(__DIR__.'/../../src/Helpers/Cell.php');

use PHPUnit\Framework\TestCase;

class CellTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\Cell();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\Helpers\Cell::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, $this->obj->title);
        
        $this->assertClassHasAttribute('subtitle', \XModule\Helpers\Cell::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, $this->obj->subtitle);
        
        $this->assertClassHasAttribute('link', \XModule\Helpers\Cell::class);
        $this->assertInstanceOf(Link::class, $this->obj->link);
        
        $this->assertClassHasAttribute('thumbnail', \XModule\Helpers\Cell::class);
        $this->assertInstanceOf(\XModule\Helpers\Thumbnail::class, $this->obj->thumbnail);
        
        $this->assertClassHasAttribute('verticalAlign', \XModule\Helpers\Cell::class);
        $this->assertInstanceOf(\XModule\DataWrappers\VerticalAlignment::class, $this->obj->verticalAlign);
        
        $this->assertClassHasAttribute('horizontalAlign', \XModule\Helpers\Cell::class);
        $this->assertInstanceOf(\XModule\DataWrappers\HorizontalAlignment::class, $this->obj->horizontalAlign);
    }
}