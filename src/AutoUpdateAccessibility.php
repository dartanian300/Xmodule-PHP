<?php
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/TextAlignment.php");
require_once("model/DataWrappers/DisclaimerType.php");
class AutoUpdateAccessibility extends Element {
	public $disclaimerType;	// DisclaimerType
	public $textAlignment;	// TextAlignment
	public $inset;	// boolean
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
