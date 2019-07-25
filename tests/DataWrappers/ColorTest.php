<?php

require_once(__DIR__.'/../../src/DataWrappers/Color.php');

use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase{
    /**
     * @dataProvider validColorProvider
     */
    public function testValidColors($color)
    {
        $obj = $this->make($color);
        $this->assertSame($obj->get(), $color);
    }
    
    /**
     * @dataProvider invalidColorProvider
     */
    public function testInvalidColors($color)
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = $this->make($color);
    }
    
    public function validColorProvider()
    {
        return [
            ['#123456'],
            ['#aedfbc'],
            ['#123acd'],
            ['#afd123'],
            ['#a123f4'],
            ['#efeb45'],
        ];
    }
    
    public function invalidColorProvider()
    {
        return [
            ['#12345z'],
            ['#cvngsr'],
            ['#00000q'],
            ['#qqruy5'],
            ['#abcdej'],
            ['#w1238a'],
        ];
    }
    
    public function make($c)
    {
        return new \XModule\DataWrappers\Color($c);
    }
}