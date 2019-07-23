<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Boolean.php");
require_once(__DIR__."/../DataWrappers/Name.php");
require_once(__DIR__."/../DataWrappers/Description.php");

use XModule\DataWrapper as DataWrapper;

abstract class FormElement extends Element {
    /** @var string */
	protected $inputType;
    /** @var Name */
	public $name;
    /** @var XString */
	public $label;
    /** @var Description */
	public $description;
    /** @var XString */
	public $value;
    /** @var \Boolean */
	public $required;
    
	public function __construct($inputType, $elementType = 'input', $id = '') 
	{
		parent::__construct($elementType, $id);
        
        $this->inputType = $inputType;
        $this->name = new DataWrapper\Name();
        $this->label = new DataWrapper\XString();
        $this->description = new DataWrapper\Description();
        $this->value = new DataWrapper\XString();
        $this->required = new DataWrapper\Boolean();
	}
}

