<?php
require_once("model/Link.php");
require_once("model/DataWrappers/Title.php");
require_once("model/Image.php");
class CarouselItem {
	public $title;	// Title
	public $subtitle;	// Title
	public $image;	// Image
	public $link;	// Link
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
