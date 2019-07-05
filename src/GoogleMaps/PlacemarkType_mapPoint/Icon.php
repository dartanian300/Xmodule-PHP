<?php
require_once("model/DataWrappers/URL.php");
require_once("model/DataWrappers/Scale.php");
class Icon {
	public $url;	// URL
	public $scale;	// Scale
	public $size;	// Size
	public $anchor;	// Anchor
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
