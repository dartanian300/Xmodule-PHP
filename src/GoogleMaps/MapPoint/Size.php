<?php
/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../../DataWrappers/Height.php");
require_once(__DIR__."/../../DataWrappers/Width.php");

class Size implements JsonSerializable {
    /** @var Width */
	public $width;
    /** @var Height */
	public $height;
    
	public function __construct() 
	{
		parent::__construct();
        
        $this->width = new Width();
        $this->height = new Height();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'height' => $this->height,
            'width' => $this->width,
        );
        
        return $format;
    }
}

