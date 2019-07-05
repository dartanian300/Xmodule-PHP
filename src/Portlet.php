<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Size.php");
require_once("model/DataWrappers/Title.php");
class Portlet extends Element {
	public $navbarTitle;	// Title
	public $navbarIcon;	// String
	public $navbarLink;	// Link
	protected $content;	// array
	protected $height;	// Size
	public $forceAjaxOnLoad;	// boolean
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
