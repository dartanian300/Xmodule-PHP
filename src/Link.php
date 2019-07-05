<?php
require_once("model/DataWrappers/BackActionTarget.php");
require_once("model/Package/QueryParameters.php");
require_once("model/Package/Module.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/Shortcut.php");
require_once("model/DataWrappers/RequestMethod.php");
require_once("model/DataWrappers/AccessoryIcon.php");
require_once("model/DataWrappers/BrowserType.php");
require_once("model/Package/Authority.php");
require_once("model/Package/NativeApp.php");
require_once("model/Package/XModule.php");
class Link {
	public $relativePath;	// String
	public $external;	// String
	public $module;	// Module
	public $xmodule;	// XModule
	public $authority;	// Authority
	public $shortcut;	// Shortcut
	public $nativeApp;	// NativeApp
	public $nativePlugin;	// String
	public $accessoryIcon;	// AccessoryIcon
	public $browserType;	// BrowserType
	public $targetNewWindow;	// boolean
	public $backActionTarget;	// BackActionTarget
	public $requestMethod;	// RequestMethod
	public $postData;	// QueryParameters
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
