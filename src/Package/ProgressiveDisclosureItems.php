<?php
require_once("model/DataWrappers/String.php");
class ProgressiveDisclosureItems {
	protected $items;	// array
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($key, $element); // [String key, mixed element]
	abstract function delete ($key); // [String key]
	public function get ($key) // [String key]
	{
		return NULL;
	}
}
?>
