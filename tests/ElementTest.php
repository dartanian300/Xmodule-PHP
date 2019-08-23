<?php

require_once(__DIR__.'/../src/Element.php');

use PHPUnit\Framework\TestCase;

class ElementTest extends TestCase{
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('elementType', Element::class);
        $this->assertClassHasAttribute('id', Element::class);
    }
    
    public function dataProvider(){
        return [
            ['testEl', 5],
            ['Akdjd', -1],
            ['People are cool', -10],
            ['Never', 0],
            ['&Wearehere!', 456],
        ];
    }
    
    /**
     *  Test both getElementType() & getId()
     *  @dataProvider dataProvider
     */
    public function testGet($elementType, $id)
    {
        $obj = new ElTest($elementType, $id);
        $this->assertSame($elementType, $obj->getElementType(), '$elementType not properly set');
        $this->assertSame($id, $obj->getId(), '$id not properly set');
    }
    
    /**
     *  Test setElementType()
     *  @dataProvider dataProvider
     */
    public function testSetElementType($elementType)
    {
        $obj = new ElTest($elementType);
        $this->assertSame($elementType, $obj->getElementType());
    }
    
    /**
     *  Test setId()
     *  @dataProvider dataProvider
     */
    public function testSetId($elementType, $id)
    {
        $obj = new ElTest('000');
        $obj->setId($id);
        $this->assertSame($id, $obj->getId());
    }    
}


// Use this class to test
class ElTest extends \Element {
    public function __construct($elemType, $id = ''){
        parent::__construct($elemType, $id);
    }
}