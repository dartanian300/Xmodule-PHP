<?php
require_once("model/DataWrappers/PerItemPadding.php");
require_once("model/DataWrappers/ContainerPadding.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/HorizontalAlignment.php");
require_once("model/DataWrappers/HorizontalSpacing.php");
require_once("model/Package/GridItem.php");
class Grid extends Element {
	public $horizontalSpacing;	// HorizontalSpacing
	public $horizontalAlignment;	// HorizontalAlignment
	public $containerPadding;	// ContainerPadding
	public $perItemPadding;	// PerItemPadding
	public $suppressVisibleLabels;	// boolean
	protected $items;	// array
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($item); // [GridItem item]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
