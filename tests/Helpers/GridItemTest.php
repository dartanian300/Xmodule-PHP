<?php

require_once(__DIR__.'/../../src/Helpers/GridItem.php');

use PHPUnit\Framework\TestCase;

class GridItemTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\GridItem();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('image', \XModule\Helpers\GridItem::class);
        $this->assertInstanceOf(Image::class, $this->obj->image);
        
        $this->assertClassHasAttribute('label', \XModule\Helpers\GridItem::class);
        $this->assertInstanceOf(Label::class, $this->obj->label);
        
        $this->assertClassHasAttribute('link', \XModule\Helpers\GridItem::class);
        $this->assertInstanceOf(Link::class, $this->obj->link);
    }
}