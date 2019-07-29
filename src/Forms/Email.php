<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

class Email extends FormElement implements \JsonSerializable {
    /** @var XString */
	public $placeholder;
    
	public function __construct() 
	{
		parent::__construct('email');
        
        $this->placeholder = new DataWrappers\XString();
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
            'placeholder' => $this->placeholder,
            'required' => $this->required,
        );
        
        return $format;
    }
}

