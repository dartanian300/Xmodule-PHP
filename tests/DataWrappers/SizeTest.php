<?php
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\Size();
        $this->values = [
            'xsmall', 'small', 'medium', 'large', 'xlarge', 'auto'
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