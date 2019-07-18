<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../DataWrappers/Number.php");

class Upload extends FormElement implements JsonSerializable {
    /** @var Number */
	public $maxFileSize;
    
	public function __construct() 
	{
		parent::__construct();
        
        $this->maxFileSize = new Number();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'inputType' => $this->inputType,
            'name' => $this->name,
            'label' => $this->label,
            'description' => $this->description,
            'required' => $this->required,
            'maxFileSize' => $this->maxFileSize,
        );
        
        return $format;
    }
}

