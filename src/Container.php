<?php
require_once("model/DataWrappers/Margins.php");
class Container extends Element {
	protected $content;	// array
	public $hidden;	// boolean
	public $margins;	// Margins
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($item); // [mixed item]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
