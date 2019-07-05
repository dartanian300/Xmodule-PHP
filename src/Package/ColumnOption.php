<?php
require_once("model/DataWrappers/VerticalAlignment.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/StringWidth.php");
require_once("model/DataWrappers/HorizontalAlignment.php");
class ColumnOption {
	public $header;	// String
	public $width;	// StringWidth
	public $verticalAlign;	// VerticalAlignment
	public $horizontalAlign;	// HorizontalAlignment
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
