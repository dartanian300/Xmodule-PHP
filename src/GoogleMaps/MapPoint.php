<?php
require_once("model/Link.php");
require_once("model/GoogleMaps/PlacemarkType_mapPoint/Icon.php");
require_once("model/DataWrappers/Title.php");
require_once("model/DataWrappers/Description.php");
require_once("model/Element.php");
class MapPoint extends Element {
	public $point;	// Point
	public $title;	// Title
	public $description;	// Description
	public $link;	// Link
	public $icon;	// Icon
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
