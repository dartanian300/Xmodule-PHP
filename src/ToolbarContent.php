<?php
require_once("model/DataWrappers/String.php");
require_once("model/Toolbar/MenuItem.php");
require_once("model/DataWrappers/MenuPosition.php");
require_once("model/DataWrappers/Number.php");
class ToolbarContent extends Element {
	protected $menuItems;	// array
	public $menuPosition;	// MenuPosition
	public $ajaxUpdateInterval;	// Number
	protected $left;	// array
	protected $middle;	// array
	protected $right;	// array
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function addMenuItems ($item); // [MenuItem item]
	abstract function addLeft ($item); // [mixed item]
	abstract function addMiddle ($item); // [mixed item]
	abstract function addRight ($item); // [mixed item]
	public function getMenuItem ($position) // [int position]
	{
		return NULL;
	}
	public function getLeft ($position) // [int position]
	{
		return NULL;
	}
	public function getMiddle ($position) // [int position]
	{
		return NULL;
	}
	public function getRight ($position) // [int position]
	{
		return NULL;
	}
}
?>
