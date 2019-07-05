<?php
require_once("model/DataWrappers/MaxHeight.php");
require_once("model/DataWrappers/Alt.php");
require_once("model/DataWrappers/MaxWidth.php");
require_once("model/Image.php");
class Thumbnail {
	public $url;	// Image
	public $maxWidth;	// MaxWidth
	public $maxHeight;	// MaxHeight
	public $crop;	// boolean
	public $alt;	// Alt
	public $badge;	// Badge
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
