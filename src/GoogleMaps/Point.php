<?php
namespace XModule\GoogleMaps;

use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

class Point implements \JsonSerializable {
    /** @var Latitude */
	public $latitude;
    /** @var Longitude */
	public $longitude;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->latitude = new DataWrappers\Latitude();
        $this->longitude = new DataWrappers\Longitude();
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

