<?php
require_once("model/Package/ProgressiveDisclosureItems.php");
require_once("model/DataWrappers/Boolean.php");
class Checkbox extends FormElement {
	public $checked;	// boolean
	public $progressiveDisclosureItems;	// ProgressiveDisclosureItems
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
