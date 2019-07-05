<?php
require_once("model/Package/ColumnOption.php");
require_once("model/Package/Row.php");
require_once("model/DataWrappers/String.php");
class Table extends Element {
	public $heading;	// String
	protected $columnOptions;	// array
	protected $rows;	// array
	protected $numColumns;	// int
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function addRow ($row); // [Row row]
	abstract function addColumnOption ($option); // [ColumnOption option]
	public function getRow ($position) // [int position]
	{
		return NULL;
	}
	public function getColumnOption ($position) // [int position]
	{
		return NULL;
	}
	public function getNumColumns () 
	{
		return 0;
	}
}
?>
