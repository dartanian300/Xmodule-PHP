<?php
class BaseLayers extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function addRoadmap (); 
	abstract function addSatellite (); 
	abstract function addHybrid (); 
	abstract function addTerrain (); 
	abstract function removeRoadmap (); 
	abstract function removeSatellite (); 
	abstract function removeHybrid (); 
	abstract function removeTerrain (); 
}
?>
