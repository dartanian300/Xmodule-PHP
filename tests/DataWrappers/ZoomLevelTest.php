<?php

require_once(__DIR__.'/../../src/DataWrappers/ZoomLevel.php');

use PHPUnit\Framework\TestCase;

class ZoomLevelTest extends TestCase{
    protected $obj;
    
    protected function setUp(): void
    {
        $this->obj = new \XModule\DataWrappers\ZoomLevel();
    }
    
    /**
     *  @dataProvider validIntegerProvider
     *  @dataProvider validFloatProvider
     */
    public function testValidNumbers($num)
    {
        $this->obj->set($num);
        $this->assertSame($this->obj->get(), $num);
    }
    
    /**
     *  @dataProvider invalidIntegerProvider
     *  @dataProvider invalidFloatProvider
     */
    public function testInvalidNumbers($num)
    {
        $this->expectException(\OutOfRangeException::class);
        $this->obj->set($num);
    }
    
    public function validIntegerProvider()
    {
        return [
            [0],
            [1],
            [2],
            [3],
            [4],
            [5],
            [6],
            [7],
            [8],
            [9],
            [10],
            [11],
            [12],
            [13],
            [14],
            [15],
            [16],
            [17],
            [18],
            [19],
            [20],
            [21],
            [22],
        ];
    }
    
    public function validFloatProvider()
    {
        return [
            [0.0],
            [.2547],
            [2.45],
            [.5],
            [4.5],
            [5/8],
            [6/7],
            [7/3],
            [11.65487],
            [19.1],
            [20.00000000000000],
            [21.2545],
            [21.99999999],
        ];
    }
    
    public function invalidIntegerProvider()
    {
        return [
            [-1],
            [-2],
            [-3],
            [-4],
            [-5],
            [-6],
            [-7],
            [-8],
            [-9],
            [-10],
            [-11],
            [-12],
            [23],
            [24],
            [25],
            [26],
            [27],
            [28],
            [29],
            [30],
            [31],
            [32],
        ];
    }
    
    public function invalidFloatProvider()
    {
        return [
            [-0.1],
            [-.2547],
            [-2.45],
            [-.5],
            [-4.5],
            [-5/8],
            [-6/7],
            [-7/3],
            [-11.65487],
            [25.00000000000000],
            [27.2545],
            [33.2],
            [122.1],
        ];
    }
}