<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../Helpers/ProgressiveDisclosureItems.php");
require_once(__DIR__."/../DataWrappers/Boolean.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;

class Checkbox extends FormElement implements \JsonSerializable {
    /** @var \Boolean */
	public $checked;
    /** @var ProgressiveDisclosureItems */
	public $progressiveDisclosureItems;
    
	public function __construct() 
	{
		parent::__construct('checkbox');
        
        $this->checked = new DataWrapper\Boolean();
        $this->progressiveDisclosureItems = new Helpers\ProgressiveDisclosureItems();
	}
    
    public function jsonSerialize()
    {        
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

