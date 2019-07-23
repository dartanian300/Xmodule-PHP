<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../DataWrappers/XString.php");

use XModule\DataWrapper as DataWrapper;

class TextInput extends FormElement implements \JsonSerializable {
    /** @var XString */
	public $placeholder;
    
	public function __construct() 
	{
		parent::__construct('text');
        
        $this->placeholder = new DataWrapper\XString();
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

