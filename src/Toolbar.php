<?php
require_once("model/DataWrappers/String.php");
class Toolbar extends Element {
	protected $left;	// array
	protected $middle;	// array
	protected $right;	// array
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function addLeft ($item); // [mixed item]
	abstract function addMiddle ($item); // [mixed item]
	abstract function addRight ($item); // [mixed item]
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
