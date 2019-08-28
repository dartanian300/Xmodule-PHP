<?php
namespace XModule\Toolbar;

use XModule\DataWrappers as DataWrappers;

class MenuItem implements \JsonSerializable {
    /** @var Title */
	public $title;
    /** @var \Boolean */
	public $selected;
    /** @var Link */
	public $link;
    /** @var XString */
	public $ajaxRelativePath;
    
	public function __construct() 
	{        
        $this->title = new DataWrappers\Title();
        $this->selected = new DataWrappers\Boolean();
        $this->link = new \Link();
        $this->ajaxRelativePath = new DataWrappers\XString();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'title' => $this->title,
            'selected' => $this->selected,
            'link' => $this->link,
        );
        
        return $format;
    }
}

