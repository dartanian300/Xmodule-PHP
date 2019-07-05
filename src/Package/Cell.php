<?php
require_once("model/DataWrappers/VerticalAlignment.php");
require_once("model/Link.php");
require_once("model/DataWrappers/Title.php");
require_once("model/DataWrappers/HorizontalAlignment.php");
class Cell {
	public $title;	// Title
	public $subtitle;	// Title
	public $link;	// Link
	public $thumbnail;	// Thumbnail
	public $verticalAlign;	// VerticalAlignment
	public $horizontalAlign;	// HorizontalAlignment
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
