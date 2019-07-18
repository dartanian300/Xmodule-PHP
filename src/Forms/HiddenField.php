<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");

class HiddenField extends FormElement implements JsonSerializable {
	public function __construct() 
	{
		parent::__construct('hidden');
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'inputType' => $this->inputType,
            'name' => $this->name,
            'value' => $this->value,
        );
        
        return $format;
    }
}

