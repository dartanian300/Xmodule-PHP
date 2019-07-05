<?php
require_once("model/DataWrappers/Title.php");
class Tab {
	public $title;	// Title
	protected $content;	// array
	public static function constructor__ () 
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
