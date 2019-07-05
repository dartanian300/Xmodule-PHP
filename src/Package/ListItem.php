<?php
require_once("model/Link.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Title.php");
require_once("model/DataWrappers/Description.php");
class ListItem {
	public $title;	// Title
	public $label;	// String
	public $description;	// Description
	public $link;	// Link
	public $thumbnail;	// Thumbnail
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
