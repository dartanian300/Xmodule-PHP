<?php

require_once(__DIR__.'/../../src/DataWrappers/PostType.php');

use PHPUnit\Framework\TestCase;

class PostTypeTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\PostType();
        $this->values = [
            'foreground', 'background'
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