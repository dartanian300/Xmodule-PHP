<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Size.php");
class Badge {
	public $value;	// String
	public $descriptor;	// String
	public $size;	// Size
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
