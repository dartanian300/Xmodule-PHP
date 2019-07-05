<?php
require_once("model/DataWrappers/String.php");
require_once("model/Element.php");
class ToolbarLabel extends Element {
	public $label;	// String
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
