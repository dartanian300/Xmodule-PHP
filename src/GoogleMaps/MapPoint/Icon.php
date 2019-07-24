<?php
namespace XModule\GoogleMaps\MapPoint;

/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../../DataWrappers/URL.php");
require_once(__DIR__."/../../DataWrappers/Scale.php");
require_once(__DIR__."/Size.php");
require_once(__DIR__."/Anchor.php");

use XModule\DataWrapper as DataWrapper;

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
        
        $this->url = new DataWrapper\URL();
        $this->scale = new DataWrapper\Scale();
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

