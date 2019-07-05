<?php
require_once("model/Package/ProgressiveDisclosureItems.php");
require_once("model/DataWrappers/String.php");
class RadioButtons extends FormElement {
	public $optionLabels;	// array
	public $optionValues;	// array
	public $progressiveDisclosureItems;	// ProgressiveDisclosureItems
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function addOptionLabel ($label); // [String label]
	public function getOptionLabel ($position) // [int position]
	{
		return "";
	}
	abstract function deleteOptionLabel ($position); // [int position]
	abstract function addOptionValue ($label); // [String label]
	public function getOptionValue ($position) // [int position]
	{
		return "";
	}
	abstract function deleteOptionValue ($position); // [int position]
}
?>
