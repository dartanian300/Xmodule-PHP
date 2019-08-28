<?php
namespace XModule\GoogleMaps\MapPoint;

use XModule\DataWrappers as DataWrappers;

class Icon implements \JsonSerializable {
    /** @var URL */
	public $url;
    /** @var Scale */
	public $scale;
    /** @var Size */
	public $size;
    /** @var Anchor */
	public $anchor;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->url = new DataWrappers\URL();
        $this->scale = new DataWrappers\Scale();
        $this->size = new Size();
        $this->anchor = new Anchor();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'url' => $this->url,
            'scale' => $this->scale,
            'size' => $this->size,
            'anchor' => $this->anchor,
        );
        
        return $format;
    }
}

