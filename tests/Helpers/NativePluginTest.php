<?php

require_once(__DIR__.'/../../src/Helpers/NativePlugin.php');

use PHPUnit\Framework\TestCase;

class NativePluginTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\NativePlugin();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('id', \XModule\Helpers\NativePlugin::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->id);
        
        $this->assertClassHasAttribute('queryParameters', \XModule\Helpers\NativePlugin::class);
        $this->assertInstanceOf(\XModule\Helpers\QueryParameters::class, $this->obj->queryParameters);
        
        $this->assertClassHasAttribute('version', \XModule\Helpers\NativePlugin::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Number::class, $this->obj->version);
    }
}