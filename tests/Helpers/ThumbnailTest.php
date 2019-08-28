<?php
use PHPUnit\Framework\TestCase;

class ThumbnailTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\Thumbnail();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('url', \XModule\Helpers\Thumbnail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\URL::class, $this->obj->url);
        
        $this->assertClassHasAttribute('maxWidth', \XModule\Helpers\Thumbnail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\MaxWidth::class, $this->obj->maxWidth);
        
        $this->assertClassHasAttribute('maxHeight', \XModule\Helpers\Thumbnail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\MaxHeight::class, $this->obj->maxHeight);
        
        $this->assertClassHasAttribute('crop', \XModule\Helpers\Thumbnail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, $this->obj->crop);
        
        $this->assertClassHasAttribute('alt', \XModule\Helpers\Thumbnail::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Alt::class, $this->obj->alt);
        
        $this->assertClassHasAttribute('badge', \XModule\Helpers\Thumbnail::class);
        $this->assertInstanceOf(\XModule\Helpers\Badge::class, $this->obj->badge);
    }
}