<?php

require_once(__DIR__.'/../../src/DataWrappers/BaseLayers.php');

use PHPUnit\Framework\TestCase;

class BaseLayersTest extends TestCase{
    public static $obj;
    
    public static function setUpBeforeClass(): void
    {
        self::$obj = new \XModule\DataWrappers\BaseLayers();
    }
    
    public function testAddRoadmap()
    {
        self::$obj->addRoadmap();
        $this->assertContains('roadmap', self::$obj->get());
    }
    
    public function testAddSatellite()
    {
        self::$obj->addSatellite();
        $this->assertContains('satellite', self::$obj->get());
    }
    
    public function testAddHybrid()
    {
        self::$obj->addHybrid();
        $this->assertContains('hybrid', self::$obj->get());
    }
    
    public function testAddTerrain()
    {
        self::$obj->addTerrain();
        $this->assertContains('terrain', self::$obj->get());
    }
    
    
    public function testRemoveRoadmap()
    {
        self::$obj->removeRoadmap();
        $this->assertNotContains('roadmap', self::$obj->get());
    }
    
    public function testRemoveSatellite()
    {
        self::$obj->removeSatellite();
        $this->assertNotContains('satellite', self::$obj->get());
    }
    
    public function testRemoveHybrid()
    {
        self::$obj->removeHybrid();
        $this->assertNotContains('hybrid', self::$obj->get());
    }
    
    public function testRemoveTerrain()
    {
        self::$obj->removeTerrain();
        $this->assertNotContains('terrain', self::$obj->get());
    }
    
}