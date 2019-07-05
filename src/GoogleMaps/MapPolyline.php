<?php
require_once("model/Link.php");
require_once("model/DataWrappers/Color.php");
require_once("model/DataWrappers/LineWidth.php");
require_once("model/DataWrappers/Title.php");
require_once("model/DataWrappers/Description.php");
require_once("model/Element.php");
require_once("model/DataWrappers/Alpha.php");
class MapPolyline extends Element {
	protected $polyline;	// array
	public $title;	// Title
	public $description;	// Description
	public $link;	// Link
	public $lineColor;	// Color
	public $lineAlpha;	// Alpha
	public $lineWidth;	// LineWidth
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($point); // [Point point]
	public function get ($position) // [mixed position]
	{
		return NULL;
	}
}
?>
