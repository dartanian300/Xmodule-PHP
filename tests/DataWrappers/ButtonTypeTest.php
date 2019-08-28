<?php
use PHPUnit\Framework\TestCase;

class ButtonTypeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\ButtonType();
        $this->values = [
            'submit', 'reset'
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