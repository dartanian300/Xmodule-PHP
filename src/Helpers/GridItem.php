<?php
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../Forms/Label.php");
require_once(__DIR__."/../Image.php");

class GridItem implements JsonSerializable {
    /** @var Image */
	public $image;
    /** @var Label */
	public $label;
    /** @var Link */
	public $link;
    
	public  function __construct() 
	{
		parent::__construct();
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

