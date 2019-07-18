<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");

class Label extends FormElement implements JsonSerializable {
	public function __construct() 
	{
		parent::__construct('label');
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'inputType' => $this->inputType,
            'label' => $this->label,
            'description' => $this->description,
            'value' => $this->value,
        );
        
        return $format;
    }
}

