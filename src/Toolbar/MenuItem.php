<?php
use XModule\Toolbar;

/**
 *  @package Toolbar
 *  
 */
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Boolean.php");
require_once(__DIR__."/../DataWrappers/Title.php");

class MenuItem implements JsonSerializable {
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
		parent::__construct();
        
        $this->title = new Title();
        $this->selected = new Boolean();
        $this->link = new Link();
        $this->ajaxRelativePath = new XString();
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

