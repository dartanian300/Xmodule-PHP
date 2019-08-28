<?php
use PHPUnit\Framework\TestCase;

class ContainerPaddingTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\ContainerPadding();
        $this->values = [
            'extraTight', 'tight', 'normal', 'loose', 'extraLoose'
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