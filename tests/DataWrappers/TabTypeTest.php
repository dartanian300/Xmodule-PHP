<?php

require_once(__DIR__.'/../../src/DataWrappers/TabType.php');

use PHPUnit\Framework\TestCase;

class TabTypeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\TabType();
        $this->values = [
            'folder', 'strip'
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