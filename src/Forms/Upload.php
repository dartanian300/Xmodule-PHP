<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../DataWrappers/Number.php");
require_once(__DIR__."/../Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrapper;
use XModule\Exceptions as Exceptions;

class Upload extends FormElement implements \JsonSerializable {
    /** @var Number */
	public $maxFileSize;
    
	public function __construct() 
	{
		parent::__construct('upload');
        
        $this->maxFileSize = new DataWrapper\Number();
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
            'required' => $this->required,
            'maxFileSize' => $this->maxFileSize,
        );
        
        return $format;
    }
}

