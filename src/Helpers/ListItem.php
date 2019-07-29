<?php
namespace XModule\Helpers;

require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../DataWrappers/Description.php");
require_once(__DIR__."/Thumbnail.php");

use XModule\DataWrappers as DataWrapper;

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
        
        $this->title = new DataWrapper\Title();
        $this->label = new DataWrapper\XString();
        $this->description = new DataWrapper\Description();
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

