<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/Title.php");
require_once(__DIR__."/DataWrappers/Description.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;

class Heading extends Element implements \JsonSerializable {
    /** @var Title */
	public $title;
    /** @var Description */
	public $description;
    /** @var \Boolean */
	public $inset;
    
	public function __construct($id = '')
	{
		parent::__construct('heading', $id);
        
        $this->title = new DataWrapper\Title();
        $this->description = new DataWrapper\Description();
        $this->inset = new DataWrapper\Inset();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'inset' => $this->inset,
        );
        
        return $format;
    }
}

