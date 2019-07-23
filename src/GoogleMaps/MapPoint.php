<?php
namespace XModule\GoogleMaps;

/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../DataWrappers/Description.php");
require_once(__DIR__."/../GoogleMaps/MapPoint/Icon.php");

use XModule\DataWrapper as DataWrapper;
use XModule\GoogleMaps\MapPoint as MapPoint;

class MapPoint extends Element implements \JsonSerializable {
    /** @var Point */
	public $point;
    /** @var Title */
	public $title;
    /** @var Description */
	public $description;
    /** @var Link */
	public $link;
    /** @var Icon */
	public $icon;
    
	public function __construct($id = '') 
	{
		parent::__construct('mapPoint', $id);
        
        $this->point = new Point();
        $this->title = new DataWrapper\Title();
        $this->description = new DataWrapper\Description();
        $this->link = new Link();
        $this->icon = new MapPoint\Icon();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'point' => $this->point,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'icon' => $this->icon,
        );
        
        return $format;
    }
}

