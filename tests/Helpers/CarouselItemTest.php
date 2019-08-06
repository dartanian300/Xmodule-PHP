<?php

require_once(__DIR__.'/../../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class CarouselItemTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\CarouselItem();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\Helpers\CarouselItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, $this->obj->title);
        
        $this->assertClassHasAttribute('subtitle', \XModule\Helpers\CarouselItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, $this->obj->subtitle);
        
        $this->assertClassHasAttribute('image', \XModule\Helpers\CarouselItem::class);
        $this->assertInstanceOf(\Image::class, $this->obj->image);
        
        $this->assertClassHasAttribute('link', \XModule\Helpers\CarouselItem::class);
        $this->assertInstanceOf(Link::class, $this->obj->link);
    }
}