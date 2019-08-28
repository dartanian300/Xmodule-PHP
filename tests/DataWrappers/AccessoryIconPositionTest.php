<?php
use PHPUnit\Framework\TestCase;

class AccessoryIconPositionTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\AccessoryIconPosition();
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