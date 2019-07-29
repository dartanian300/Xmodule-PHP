<?php
namespace XModule\Helpers;

require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../Image.php");
require_once(__DIR__."/../DataWrappers/Title.php");

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

