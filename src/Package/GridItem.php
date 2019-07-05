<?php
require_once("model/Link.php");
require_once("model/Forms/Label.php");
require_once("model/Image.php");
class GridItem {
	public $image;	// Image
	public $label;	// Label
	public $link;	// Link
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
