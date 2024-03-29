<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;
use XModule\Exceptions as Exceptions;

class Checkbox extends FormElement implements \JsonSerializable {
    /** @var \Boolean */
	public $checked;
    /** @var ProgressiveDisclosureItems */
	public $progressiveDisclosureItems;
    
	public function __construct() 
	{
		parent::__construct('checkbox');
        
        $this->checked = new DataWrappers\Boolean();
        $this->progressiveDisclosureItems = new Helpers\ProgressiveDisclosureItems();
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
            'checked' => $this->checked,
            'progressiveDisclosureItems' => $this->progressiveDisclosureItems
        );
        
        return $format;
    }
}

