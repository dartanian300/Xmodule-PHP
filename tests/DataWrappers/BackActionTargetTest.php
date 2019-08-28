<?php
use PHPUnit\Framework\TestCase;

class BackActionTargetTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\BackActionTarget();
        $this->values = [
            'parent', 'grandparent', 'module', 'home', 'none'
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