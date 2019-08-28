<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class ListItem implements \JsonSerializable {
    /** @var Title */
	public $title;
    /** @var XString */
	public $label;
    /** @var Description */
	public $description;
    /** @var Link */
	public $link;
    /** @var Thumbnail */
	public $thumbnail;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->title = new DataWrappers\Title();
        $this->label = new DataWrappers\XString();
        $this->description = new DataWrappers\Description();
        $this->link = new \Link();
        $this->thumbnail = new Thumbnail();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'title' => $this->title,
            'label' => $this->label,
            'description' => $this->description,
            'link' => $this->link,
            'thumbnail' => $this->thumbnail,
        );
        
        return $format;
    }
}

