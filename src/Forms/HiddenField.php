<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrapper;
use XModule\Exceptions as Exceptions;

class HiddenField extends FormElement implements \JsonSerializable {
	public function __construct() 
	{
		parent::__construct('hidden');
	}
    
    public function jsonSerialize()
    {        
        if ($this->name->get() === null)
            throw new Exceptions\RequiredProperty('name', __CLASS__);
        if ($this->value->get() === null)
            throw new Exceptions\RequiredProperty('value', __CLASS__);
        
        $format = array(
            'elementType' => $this->elementType,
            'inputType' => $this->inputType,
            'name' => $this->name,
            'value' => $this->value,
        );
        
        return $format;
    }
}

