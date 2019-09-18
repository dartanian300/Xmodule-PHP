<?php
use PHPUnit\Framework\TestCase;

class ShortcutHelperTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\Shortcut();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('type', \XModule\Helpers\Shortcut::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Shortcut::class, $this->obj->type);
    }
}