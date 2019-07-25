<?php

require_once(__DIR__.'/../../src/DataWrappers/AspectRatio.php');

use PHPUnit\Framework\TestCase;

class AspectRatioTest extends TestCase{
    protected $obj;
    protected $values;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\AspectRatio();
        $this->values = [
            'sixteenNine' => '16:9',
            'fourThree' => '4:3',
            'oneOne' => '1:1',
            'thirteenFour' => '13:4',
            'nineSixteen' => '9:16'
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