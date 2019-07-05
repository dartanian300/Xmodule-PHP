<?php
require_once("model/DataWrappers/PostType.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/RequestMethod.php");
require_once("model/Element.php");
class Form extends Element {
	public $relativePath;	// String
	public $requestMethod;	// RequestMethod
	public $postType;	// PostType
	public $heading;	// String
	protected $items;	// array
	public $disableScrim;	// boolean
	public $loadingTitle;	// String
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
	abstract function delete ($position); // [int position]
}
?>
