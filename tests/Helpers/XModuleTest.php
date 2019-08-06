<?php

require_once(__DIR__.'/../../src/Helpers/XModule.php');

use PHPUnit\Framework\TestCase;

class XModuleTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\XModule();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('relativePath', \XModule\Helpers\XModule::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->relativePath);
    }
}