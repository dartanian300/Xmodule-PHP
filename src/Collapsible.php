<?php
require_once("model/DataWrappers/DisclosureIcon.php");
require_once("model/DataWrappers/Title.php");
class Collapsible extends Element {
	public $title;	// Title
	public $collapsed;	// boolean
	public $disclosureIcon;	// DisclosureIcon
	protected $content;	// array
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
