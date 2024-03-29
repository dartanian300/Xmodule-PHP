<?php
use PHPUnit\Framework\TestCase;

class MarginsTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\Margins();
        $this->values = [
            'none', 'responsive', 'minimal'
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