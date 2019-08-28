<?php
use PHPUnit\Framework\TestCase;

class NativeAppTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\NativeApp();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('nativeAppURL', \XModule\Helpers\NativeApp::class);
        $this->assertInstanceOf(\XModule\DataWrappers\URL::class, $this->obj->nativeAppURL);
        
        $this->assertClassHasAttribute('fallbackLink', \XModule\Helpers\NativeApp::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->fallbackLink);
    }
}