<?php
use PHPUnit\Framework\TestCase;

class ListItemTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\ListItem();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('title', \XModule\Helpers\ListItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Title::class, $this->obj->title);
        
        $this->assertClassHasAttribute('label', \XModule\Helpers\ListItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->label);
        
        $this->assertClassHasAttribute('description', \XModule\Helpers\ListItem::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Description::class, $this->obj->description);
        
        $this->assertClassHasAttribute('link', \XModule\Helpers\ListItem::class);
        $this->assertInstanceOf(Link::class, $this->obj->link);
        
        $this->assertClassHasAttribute('thumbnail', \XModule\Helpers\ListItem::class);
        $this->assertInstanceOf(\XModule\Helpers\Thumbnail::class, $this->obj->thumbnail);
    }
}