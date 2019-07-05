<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/Package/ListItem.php");
class List extends Element {
	public $heading;	// String
	public $grouped;	// boolean
	protected $items;	// array
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($item); // [ListItem item]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
