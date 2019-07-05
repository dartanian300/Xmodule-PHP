<?php
require_once("model/DataWrappers/ZoomLevel.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/AspectRatio.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/Longitude.php");
require_once("model/DataWrappers/Latitude.php");
require_once("model/DataWrappers/BaseLayers.php");
require_once("model/GoogleMaps/DynamicPlacemarks.php");
class GoogleMap extends Element {
	public $initialLatitude;	// Latitude
	public $initialLongitude;	// Longitude
	public $initialZoomLevel;	// ZoomLevel
	public $disableZoomToPlacemarks;	// boolean
	public $defaultToUserLocated;	// boolean
	public $minZoomLevel;	// ZoomLevel
	public $maxZoomLevel;	// ZoomLevel
	public $aspectRatio;	// AspectRatio
	public $inset;	// boolean
	public $showUserLocationButton;	// boolean
	public $showRecenterButton;	// boolean
	public $showZoomButtons;	// boolean
	public $baseLayers;	// BaseLayers
	protected $staticPlacemarks;	// array
	protected $dynamicPlacemarks;	// DynamicPlacemarks
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
