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

use XModule\DataWrappers as DataWrappers;

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
        $this->name = new DataWrappers\Name();
        $this->label = new DataWrappers\XString();
        $this->description = new DataWrappers\Description();
        $this->value = new DataWrappers\XString();
        $this->required = new DataWrappers\Boolean();
	}
}

