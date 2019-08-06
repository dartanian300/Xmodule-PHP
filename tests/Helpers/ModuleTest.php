<?php

require_once(__DIR__.'/../../src/Helpers/Module.php');

use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\Module();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('id', \XModule\Helpers\Module::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->id);
        
        $this->assertClassHasAttribute('page', \XModule\Helpers\Module::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->page);
        
        $this->assertClassHasAttribute('queryParameters', \XModule\Helpers\Module::class);
        $this->assertInstanceOf(\XModule\Helpers\QueryParameters::class, $this->obj->queryParameters);
    }
}