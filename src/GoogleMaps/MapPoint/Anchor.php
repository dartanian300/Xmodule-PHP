<?php
/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../../DataWrappers/Number.php");

class Anchor implements JsonSerializable {
    /** @var Number */
	public $x;
    /** @var Number */
	public $y;
    
	public function __construct() 
	{
		parent::__construct();
        
        $this->x = new Number();	// Number
        $this->y = new Number();	// Number
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

