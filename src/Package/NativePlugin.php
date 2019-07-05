<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Number.php");
class NativePlugin {
	public $id;	// String
	public $queryParameters;	// QueryParameters
	public $version;	// Number
	public $fallbackLink;	// mixed
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
