<?php

require_once(__DIR__.'/../../src/DataWrappers/RequestMethod.php');

use PHPUnit\Framework\TestCase;

class RequestMethodTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\RequestMethod();
        $this->values = [
            'setGet' => 'get',
            'setPost' => 'post'
        ];
    }
    
    public function testSetters()
    {
        foreach($this->values as $method => $value){
            $this->obj->{$method}();
            $this->assertSame($this->obj->get(), $value);
        }
    }
}