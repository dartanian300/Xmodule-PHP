<?php
namespace XModule\DataWrappers;

class BaseLayers extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
        $this->data = array();
	}
    
	public function addRoadmap()
    {
        $this->data[] = 'roadmap';
    }
    
	public function addSatellite()
    {
        $this->data[] = 'satellite';
    }
    
	public function addHybrid()
    {
        $this->data[] = 'hybrid';
    }
    
	public function addTerrain()
    {
        $this->data[] = 'terrain';
    }
    
    
	public function removeRoadmap()
    {
        $this->remove('roadmap');
    }
    
	public function removeSatellite()
    {
        $this->remove('satellite');
    }
    
	public function removeHybrid()
    {
        $this->remove('hybrid');
    }
    
	public function removeTerrain()
    {
        $this->remove('terrain');
    }
    
    /**
     *  Removes a string from the data array
     *  @param string $value The string to remove
     */
    private function remove($value){
        $position = array_search($value, $this->data);
        
        if ($position !== false)
            array_splice($this->data, $position, 1);
    }
    
}

