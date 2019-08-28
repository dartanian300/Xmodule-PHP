<?php
namespace XModule\GoogleMaps\MapPoint;

use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

class Size implements \JsonSerializable {
    /** @var Width */
	public $width;
    /** @var Height */
	public $height;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->width = new DataWrappers\Width();
        $this->height = new DataWrappers\Height();
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

