<?php
use PHPUnit\Framework\TestCase;

class HorizontalSpacingTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\HorizontalSpacing();
        $this->values = [
            'extraTight', 'tight', 'normal', 'loose'
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