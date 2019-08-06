<?php

require_once(__DIR__.'/../../src/Helpers/Authority.php');

use PHPUnit\Framework\TestCase;

class AuthorityTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\Helpers\Authority();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('type', \XModule\Helpers\Authority::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, $this->obj->type);
    }
}