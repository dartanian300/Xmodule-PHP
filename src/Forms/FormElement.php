<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/Name.php");
require_once("model/DataWrappers/Description.php");
require_once("model/Element.php");
class FormElement extends Element {
	protected $inputType;	// String
	public $name;	// Name
	public $label;	// String
	public $description;	// Description
	public $value;	// String
	public $required;	// boolean
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
