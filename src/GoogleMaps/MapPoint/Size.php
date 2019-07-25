<?php
namespace XModule\GoogleMaps\MapPoint;

/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../../DataWrappers/Height.php");
require_once(__DIR__."/../../DataWrappers/Width.php");

use XModule\DataWrappers as DataWrapper;

class Size implements \JsonSerializable {
    /** @var Width */
	public $width;
    /** @var Height */
	public $height;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->width = new DataWrapper\Width();
        $this->height = new DataWrapper\Height();
	}
    
    public function jsonSerialize()
    {       
        if ($this->width->get() === null)
            throw new Exceptions\RequiredProperty('width', __CLASS__);
        if ($this->height->get() === null)
            throw new Exceptions\RequiredProperty('height', __CLASS__);
        
        $format = array(
            'height' => $this->height,
            'width' => $this->width,
        );
        
        return $format;
    }
}

