<?php
require_once("model/DataWrappers/Longitude.php");
require_once("model/DataWrappers/Latitude.php");
class Point {
	public $latitude;	// Latitude
	public $longitude;	// Longitude
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
