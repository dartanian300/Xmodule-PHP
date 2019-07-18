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
require_once(__DIR__."/../Element.php");

abstract class FormElement extends Element {
    /** @var XString */
	private $inputType;
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
        
        $this->inputType = new XString($inputType);
        $this->name = new Name();
        $this->label = new XString();
        $this->description = new Description();
        $this->value = new XString();
        $this->required = new Boolean();
	}
}

