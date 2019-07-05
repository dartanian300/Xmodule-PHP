<?php
class XModuleResponse {
	protected $metadata;	// array
	protected $content;	// array
	protected $regionContent;	// array
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function XModuleBase (); 
	public function print () 
	{
		return "";
	}
	abstract function add ($item); // [mixed item]
	public function get ($position) // [int position]
	{
		return NULL;
	}
	abstract function delete ($position); // [int position]
}
?>
