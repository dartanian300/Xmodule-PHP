<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Number.php");
class MultiColumn extends Element {
	protected $columns;	// array
	protected $numColumns;	// Number
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function setNumColumns ($num); // [int num]
	abstract function getNumColumns (); 
	abstract function add ($columnNum, $item); // [int columnNum, mixed item]
}
?>
