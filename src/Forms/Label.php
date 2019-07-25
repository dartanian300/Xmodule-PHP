<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrapper;

class Label extends FormElement implements \JsonSerializable {
	public function __construct() 
	{
		parent::__construct('label');
	}
    
    public function jsonSerialize()
    {        
        if ($this->label->get() === null)
            throw new Exceptions\RequiredProperty('label', __CLASS__);
        
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

