<?php
namespace XModule\GoogleMaps;

/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../DataWrappers/Longitude.php");
require_once(__DIR__."/../DataWrappers/Latitude.php");
require_once(__DIR__."/../Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrapper;

class Point implements \JsonSerializable {
    /** @var Latitude */
	public $latitude;
    /** @var Longitude */
	public $longitude;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->latitude = new DataWrapper\Latitude();
        $this->longitude = new DataWrapper\Longitude();
	}
    
    public function jsonSerialize()
    {
        if ($this->latitude->get() === null)
            throw new Exceptions\RequiredProperty('latitude', __CLASS__);
        if ($this->longitude->get() === null)
            throw new Exceptions\RequiredProperty('longitude', __CLASS__);
        
        $format = array(
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        );
        
        return $format;
    }
}

