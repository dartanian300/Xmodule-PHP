<?php
require_once("model/DataWrappers/String.php");
class Authority {
	public $type;	// String
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
