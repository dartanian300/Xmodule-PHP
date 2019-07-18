<?php
require_once(__DIR__."/../DataWrappers/VerticalAlignment.php");
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../DataWrappers/HorizontalAlignment.php");

class Cell implements JsonSerializable {
    /** @var Title */
	public $title;
    /** @var Title */
	public $subtitle;
    /** @var Link */
	public $link;
    /** @var Thumbnail */
	public $thumbnail;
    /** @var VerticalAlignment */
	public $verticalAlign;
    /** @var HorizontalAlignment */
	public $horizontalAlign;
    
	public function __construct() 
	{
//		parent::__construct();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'link' => $this->link,
            'thumbnail' => $this->thumbnail,
            'verticalAlign' => $this->verticalAlign,
            'horizontalAlign' => $this->horizontalAlign,
        );
        
        return $format;
    }
}

