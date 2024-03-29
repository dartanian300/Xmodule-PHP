<?php
namespace XModule\GoogleMaps;

use XModule\DataWrappers as DataWrappers;
use XModule\GoogleMaps\MapPoint as MapPoint;

class MapPoint extends \Element implements \JsonSerializable {
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
        $this->title = new DataWrappers\Title();
        $this->description = new DataWrappers\Description();
        $this->link = new \Link();
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

