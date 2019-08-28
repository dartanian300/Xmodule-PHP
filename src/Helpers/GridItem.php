<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class GridItem implements \JsonSerializable {
    /** @var Image */
	public $image;
    /** @var Label */
	public $label;
    /** @var Link */
	public $link;
    
	public  function __construct() 
	{
//		parent::__construct();
        
        $this->image = new \Image();
        $this->label = new \Label();
        $this->link = new \Link();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'image' => $this->image,
            'label' => $this->label,
            'link' => $this->link,
        );
        
        return $format;
    }
}

