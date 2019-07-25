<?php

require_once(__DIR__.'/../../src/DataWrappers/PerItemPadding.php');

use PHPUnit\Framework\TestCase;

class PerItemPaddingTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\PerItemPadding();
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