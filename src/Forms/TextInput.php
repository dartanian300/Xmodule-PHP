<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../DataWrappers/String.php");

class TextInput extends FormElement implements JsonSerializable {
    /** @var XString */
	public $placeholder;
    
	public function __construct() 
	{
		parent::__construct('text');
        
        $this->placeholder = new XString();
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
            'placeholder' => $this->placeholder,
            'required' => $this->required,
        );
        
        return $format;
    }
}

