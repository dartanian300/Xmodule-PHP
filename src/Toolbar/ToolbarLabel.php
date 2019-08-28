<?php
namespace XModule\Toolbar;

use XModule\DataWrappers as DataWrappers;

class ToolbarLabel extends \Element implements \JsonSerializable {
    /** @var XString */
	public $label;
    
	public function __construct($id = '') 
	{
		parent::__construct('toolbarLabel', $id);
        
        $this->label = new DataWrappers\XString();
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

