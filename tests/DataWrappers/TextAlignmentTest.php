<?php

require_once(__DIR__.'/../../src/DataWrappers/TextAlignment.php');

use PHPUnit\Framework\TestCase;

class TextAlignmentTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\TextAlignment();
        $this->values = [
            'left', 'right', 'center'
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