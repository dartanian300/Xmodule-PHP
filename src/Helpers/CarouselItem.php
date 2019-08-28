<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class CarouselItem implements \JsonSerializable {
    /** @var Title */
	public $title;
    /** @var Title */
	public $subtitle;
    /** @var Image */
	public $image;
    /** @var Link */
	public $link;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->title = new DataWrappers\Title();
        $this->subtitle = new DataWrappers\Title();
        $this->image = new \Image();
        $this->link = new \Link();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'image' => $this->image,
            'link' => $this->link,
        );
        
        return $format;
    }
}

