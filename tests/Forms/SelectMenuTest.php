<?php

require_once(__DIR__.'/../../src/Forms/SelectMenu.php');
//require_once(__DIR__.'/../../src/Helpers/GridItem.php');
require_once(__DIR__.'/../../src/Helpers/CarouselItem.php');

use PHPUnit\Framework\TestCase;

class SelectMenuTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new SelectMenu();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('progressiveDisclosureItems', SelectMenu::class);
        $this->assertInstanceOf(\XModule\Helpers\ProgressiveDisclosureItems::class, self::$obj->progressiveDisclosureItems);
        
        $this->assertClassHasAttribute('optionValues', RadioButtons::class);
        
        $this->assertClassHasAttribute('optionLabels', RadioButtons::class);
    }
    
    
    
    // Make sure get is returning an empty array
    public function testGetEmptyOptionLabel()
    {
        $this->assertIsIterable(self::$obj->getOptionLabel(), '$optionLabels is not iterable');
        $this->assertEmpty(self::$obj->getOptionLabel(), '$optionLabels is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProviderOptionLabel
     *  @depends testGetEmptyOptionLabel
     */
    public function testAddGetOptionLabel($item)
    {
        self::$obj->addOptionLabel($item);
        $this->assertSame($item, self::$obj->getOptionLabel(0), 'addOptionLabel() and getOptionLabel() do not modify the same property');
    }
    public function addSingleProviderOptionLabel(){
        return [
            ['t'],
        ];
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalidOptionLabel()
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addOptionLabel([453, true, new \XModule\Helpers\CarouselItem()]);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetOptionLabel
     */
    public function testDeleteOptionLabel()
    {
        $countBefore = count(self::$obj->getOptionLabel());
        
        self::$obj->deleteOptionLabel($countBefore - 1);
        
        $countAfter = count(self::$obj->getOptionLabel());
        $this->assertSame($countBefore - 1, $countAfter, 'deleteOptionLabel() did not remove the correct number of elements');
    }
    
    
    
    // Make sure get is returning an empty array
    public function testGetEmptyOptionValue()
    {
        $this->assertIsIterable(self::$obj->getOptionValue(), '$optionValues is not iterable');
        $this->assertEmpty(self::$obj->getOptionValue(), '$optionValues is not empty');
    }
    
    /**
     *  Test both add() and get()
     *  @dataProvider addSingleProviderOptionValue
     *  @depends testGetEmptyOptionValue
     */
    public function testAddGetOptionValue($item)
    {
        self::$obj->addOptionValue($item);
        $this->assertSame($item, self::$obj->getOptionValue(0), 'addOptionValue() and getOptionValue() do not modify the same property');
    }
    public function addSingleProviderOptionValue(){
        return [
            ['t'],
        ];
    }
    
    /**
     *  Make sure exceptions are thrown on invalid inputs
     */
    public function testAddInvalidOptionValue()
    {
        $this->expectException(InvalidArgumentException::class);
        self::$obj->addOptionValue([453, true, new \XModule\Helpers\CarouselItem()]);
    }

    /**
     *  Test deleting an element from the back of array
     *  @depends testAddGetOptionValue
     */
    public function testDeleteOptionValue()
    {
        $countBefore = count(self::$obj->getOptionValue());
        
        self::$obj->deleteOptionValue($countBefore - 1);
        
        $countAfter = count(self::$obj->getOptionValue());
        $this->assertSame($countBefore - 1, $countAfter, 'deleteOptionValue() did not remove the correct number of elements');
    }
    
    
}