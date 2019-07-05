<?php
require_once("model/Element.php");
class ToolbarMenu extends Element {
	protected $items;	// array
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($item); // [MenuItem item]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
