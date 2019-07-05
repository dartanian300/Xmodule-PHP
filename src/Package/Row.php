<?php
require_once("model/Link.php");
class Row {
	protected $cells;	// array
	public $link;	// Link
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($cell); // [Cell cell]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
