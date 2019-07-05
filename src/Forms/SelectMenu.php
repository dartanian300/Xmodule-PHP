<?php
require_once("model/Package/ProgressiveDisclosureItems.php");
require_once("model/DataWrappers/String.php");
class SelectMenu extends FormElement {
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
	abstract function deleteOptionValue ($position); // [int position]
	public function getOptionValue ($position) // [int position]
	{
		return "";
	}
	abstract function addOptionValue ($label); // [String label]
	abstract function deleteOptionLabel ($position); // [int position]
	public function getOptionLabel ($position) // [int position]
	{
		return "";
	}
}
?>
