<?php
use PHPUnit\Framework\TestCase;

class DisclosureIconTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\DisclosureIcon();
        $this->values = [
            'plusminus', 'chevron'
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