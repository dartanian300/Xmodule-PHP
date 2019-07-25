<?php

require_once(__DIR__.'/../../src/DataWrappers/AccessoryIcon.php');

use PHPUnit\Framework\TestCase;

class AccessoryIconTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\AccessoryIcon();
    }
    
    public function testSame()
    {
        $this->assertSame('test2', 'test2');
    }
}