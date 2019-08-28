<?php
use PHPUnit\Framework\TestCase;

class BooleanTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\Boolean();
    }
    
    public function testTrue()
    {
        $this->obj->true();
        $this->assertTrue($this->obj->get());
    }
    
    public function testFalse()
    {
        $this->obj->false();
        $this->assertFalse($this->obj->get());
    }
}