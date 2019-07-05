<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/Title.php");
require_once("model/DataWrappers/Description.php");
class Heading extends Element {
	public $title;	// Title
	public $description;	// Description
	public $inset;	// boolean
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
