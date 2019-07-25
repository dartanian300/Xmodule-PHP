<?php

require_once(__DIR__.'/../../src/DataWrappers/MenuPosition.php');

use PHPUnit\Framework\TestCase;

class MenuPositionTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\MenuPosition();
        $this->values = [
            'left', 'right'
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