<?php
require_once("model/Package/Thumbnail.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Title.php");
class Detail extends Element {
	public $title;	// Title
	public $subtitle;	// Title
	public $body;	// String
	protected $content;	// array
	public $thumbnail;	// Thumbnail
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
