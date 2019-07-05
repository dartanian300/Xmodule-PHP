<?php
require_once("model/DataWrappers/Height.php");
require_once("model/DataWrappers/Width.php");
class Size {
	public $width;	// Width
	public $height;	// Height
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
