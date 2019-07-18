<?php
/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../DataWrappers/Longitude.php");
require_once(__DIR__."/../DataWrappers/Latitude.php");

class Point implements JsonSerializable {
    /** @var Latitude */
	public $latitude;
    /** @var Longitude */
	public $longitude;
    
	public function __construct() 
	{
		parent::__construct();
        
        $this->latitude = new Latitude();
        $this->longitude = new Longitude();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        );
        
        return $format;
    }
}

