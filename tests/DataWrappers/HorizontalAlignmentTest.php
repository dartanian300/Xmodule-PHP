<?php
use PHPUnit\Framework\TestCase;

class HorizontalAlignmentTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\HorizontalAlignment();
        $this->values = [
            'left', 'center', 'right'
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