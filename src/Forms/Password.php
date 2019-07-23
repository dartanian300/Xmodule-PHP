<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");

use XModule\DataWrapper as DataWrapper;

class Password extends FormElement implements \JsonSerializable {
	public function __construct() 
	{
		parent::__construct('password');
	}
    
    public function jsonSerialize()
    {        
        if ($this->name->get() === null)
            throw new Exceptions\RequiredProperty('name', __CLASS__);
        if ($this->label->get() === null)
            throw new Exceptions\RequiredProperty('label', __CLASS__);
        
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

