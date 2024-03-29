<?php
namespace XModule\GoogleMaps\MapPoint;

use XModule\DataWrappers as DataWrappers;

class Anchor implements \JsonSerializable {
    /** @var Number */
	public $x;
    /** @var Number */
	public $y;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->x = new DataWrappers\Number();
        $this->y = new DataWrappers\Number();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'x' => $this->x,
            'y' => $this->y,
        );
        
        return $format;
    }
}

