<?php
use PHPUnit\Framework\TestCase;

class ShortcutTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\Shortcut();
        $this->values = [
            'moduleParentHome', 'personaHome'
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