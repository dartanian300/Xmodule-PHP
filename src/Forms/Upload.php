<?php
require_once("model/DataWrappers/Number.php");
class Upload extends FormElement {
	public $maxFileSize;	// Number
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
