<?php
use XModule\Toolbar;

/**
 *  @package Toolbar
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../DataWrappers/XString.php");

use XModule\DataWrappers as DataWrapper;

class ToolbarLabel extends Element implements \JsonSerializable {
    /** @var XString */
	public $label;
    
	public function __construct($id = '') 
	{
		parent::__construct('toolbarLabel', $id);
        
        $this->label = new DataWrapper\XString();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'label' => $this->label,
        );
        
        return $format;
    }
}

