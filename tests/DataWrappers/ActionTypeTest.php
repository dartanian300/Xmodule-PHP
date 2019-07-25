<?php

require_once(__DIR__.'/../../src/DataWrappers/ActionType.php');

use PHPUnit\Framework\TestCase;

class ActionTypeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\ActionType();
        $this->values = [
            'constructive', 'destructive', 'emphasized'
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