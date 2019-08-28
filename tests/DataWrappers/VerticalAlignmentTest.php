<?php
use PHPUnit\Framework\TestCase;

class VerticalAlignmentTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\VerticalAlignment();
        $this->values = [
            'top', 'middle', 'bottom'
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