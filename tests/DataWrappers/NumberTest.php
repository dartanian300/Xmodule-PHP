<?php

require_once(__DIR__.'/../../src/DataWrappers/Number.php');

use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\Number();
    }
    
    
    /**
     * @dataProvider noMinMaxProvider
     */
    public function testNoMinMax($num)
    {
        $this->obj->set($num);
        $this->assertSame($this->obj->get(), $num);
    }
    public function noMinMaxProvider(){
        return [ [-2], [-10], [-2.54], [0], [1], [5], [7.65], [1000] ];
    }
    
    
    /**
     * @dataProvider validMinIntProvider
     */
    public function testValidMinInt($num)
    {
        $this->obj->setMin(2);
        $this->obj->set($num);
        $this->assertSame($this->obj->get(), $num);
    }
    public function validMinIntProvider(){
        return [ [2.01], [5], [7.65], [1000], [1254756] ];
    }
    
    
    /**
     * @dataProvider invalidMinIntProvider
     */
    public function testInvalidMinInt($num)
    {
//        $nums = [ 0, 1, 1.9999999, -2.01, -5, -7.65, -1000, -1254756];
        $this->obj->setMin(2);
        $this->expectException(OutOfRangeException::class);
        
        $this->obj->set($num);
    }
    public function invalidMinIntProvider(){
        return [ [0], [1], [1.9999999], [-2.01], [-5], [-7.65], [-1000], [-1254756] ];
    }
    
    
    /**
     * @dataProvider validMinFloatProvider
     */
    public function testValidMinFloat($num)
    {
        $this->obj->setMin(2.001);
        $this->obj->set($num);
        $this->assertSame($this->obj->get(), $num);
    }
    public function validMinFloatProvider(){
        return [ [2.01], [5], [7.65], [1000], [1254756] ];
    }
    
    
    /**
     * @dataProvider invalidMinFloatProvider
     */
    public function testInvalidMinFloat($num)
    {
        $this->obj->setMin(2.001);
        $this->expectException(\OutOfRangeException::class);
        $this->obj->set($num);
    }
    public function invalidMinFloatProvider(){
        return [ [0], [1], [1.9999999], [-2.01], [-5], [-7.65], [-1000], [-1254756] ];
    }
    
    
    /**
     * @dataProvider validMaxIntProvider
     */
    public function testValidMaxInt($num)
    {
        $this->obj->setMax(11);
        $this->obj->set($num);
        $this->assertSame($this->obj->get(), $num);
    }
    public function validMaxIntProvider(){
        return [ [-541], [-5.24], [0], [1], [2.01], [5], [7.65], [10.00], [10.00000001], [10.99999] ];
    }
    
    
    /**
     * @dataProvider invalidMaxIntProvider
     */
    public function testInvalidMaxInt($num)
    {
        $this->obj->setMax(11);
        $this->expectException(\OutOfRangeException::class);
        $this->obj->set($num);
    }
    public function invalidMaxIntProvider(){
        return [ [11.0000001], [11.1], [12], [15], [57], [102547], [478947.245] ];
    }
    
    
    
    
    /**
     * @dataProvider validMaxFloatProvider
     */
    public function testValidMaxFloat($num)
    {
        $this->obj->setMax(11.25);
            $this->obj->set($num);
            $this->assertSame($this->obj->get(), $num);
    }
    public function validMaxFloatProvider(){
        return [ [-541], [-5.24], [0], [1], [2.01], [5], [7.65], [10.00], [10.00000001], [10.99999] ];
    }
    
    
    /**
     * @dataProvider invalidMaxFloatProvider
     */
    public function testInvalidMaxFloat($num)
    {
        $this->obj->setMax(11.25);
        $this->expectException(\OutOfRangeException::class);
        $this->obj->set($num);
    }
    public function invalidMaxFloatProvider(){
        return [ [11.26], [11.5], [12], [15], [57], [102547], [478947.245] ];
    }
    
    
    
    
    /**
     * @dataProvider validMinMaxProvider
     */
    public function testValidMinMax($num)
    {
        $this->obj->setMin(-5);
        $this->obj->setMax(547.5);
        
        $this->obj->set($num);
        $this->assertSame($this->obj->get(), $num);
    }
    public function validMinMaxProvider(){
        return [ [-4.9999], [-4], [-2.54], [0], [1], [54.24], [547.4444449] ];
    }
    
    
    /**
     * @dataProvider invalidMinMaxProvider
     */
    public function testInvalidMinMax($num)
    {
        $this->obj->setMin(-5);
        $this->obj->setMax(547.5);
        $this->expectException(\OutOfRangeException::class);
        
        $this->obj->set($num);
    }
    public function invalidMinMaxProvider(){
        return [ [-10.9999], [-5.1], [547.5000001], [5457.24] ];
    }

}