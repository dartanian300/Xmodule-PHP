<?php
use PHPUnit\Framework\TestCase;

class DisclaimerTypeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\DisclaimerType();
        $this->values = [
            'header', 'footer'
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