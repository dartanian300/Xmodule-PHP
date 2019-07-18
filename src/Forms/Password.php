<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");

class Password extends FormElement implements JsonSerializable {
	public function __construct() 
	{
		parent::__construct('password');
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'inputType' => $this->inputType,
            'name' => $this->name,
            'label' => $this->label,
            'description' => $this->description,
            'value' => $this->value,
            'required' => $this->required,
        );
        
        return $format;
    }
}

