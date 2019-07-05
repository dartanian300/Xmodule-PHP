<?php
require_once("model/Link.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/Title.php");
class MenuItem {
	public $title;	// Title
	public $selected;	// boolean
	public $link;	// Link
	public $ajaxRelativePath;	// String
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
