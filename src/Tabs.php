<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/Package/Tab.php");
require_once("model/DataWrappers/TabType.php");
class Tabs extends Element {
	protected $tabs;	// array
	public $tabType;	// TabType
	public $forceAjaxOnLoad;	// boolean
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($tab); // [Tab tab]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
