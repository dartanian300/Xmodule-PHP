<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/URL.php");
class NativeApp {
	public $nativeAppURL;	// URL
	public $fallbackLink;	// String
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
