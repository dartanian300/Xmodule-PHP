<?php
require_once("model/DataWrappers/String.php");
class TextInput extends FormElement {
	public $placeholder;	// String
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
