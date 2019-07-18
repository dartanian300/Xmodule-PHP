<?php
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../Image.php");

class CarouselItem implements JsonSerializable {
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
		parent::__construct();
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

