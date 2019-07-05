<?php
require_once("model/DataWrappers/Number.php");
class Anchor {
	public $x;	// Number
	public $y;	// Number
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
