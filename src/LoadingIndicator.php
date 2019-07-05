<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
class LoadingIndicator extends Element {
	public $label;	// String
	public $hidden;	// boolean
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
