<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
class HTML extends Element {
	public $html;	// String
	public $focal;	// boolean
	public $inset;	// boolean
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
