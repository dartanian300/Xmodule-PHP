<?php

require_once(__DIR__.'/../../src/DataWrappers/BrowserType.php');

use PHPUnit\Framework\TestCase;

class BrowserTypeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\BrowserType();
        $this->values = [
            'appModal', 'appScreen', 'systemBrowserEmbedded', 'systemBrowserExternal', 'operation'
        ];
    }
    
    public function testSetters()
    {
        foreach($this->values as $value){
            $this->obj->{$value}();
            $this->assertSame($this->obj->get(), $value);
        }
    }
}