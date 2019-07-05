<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Alt.php");
require_once("model/DataWrappers/URL.php");
require_once("model/DataWrappers/Boolean.php");
class Image extends Element {
	public $url;	// URL
	public $alt;	// Alt
	public $scaleToFull;	// boolean
	public $enableZoomControls;	// boolean
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
