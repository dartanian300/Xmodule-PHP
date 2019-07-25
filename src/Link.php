<?php
/**
 *  @package Link
 *  
 */
require_once(__DIR__."/DataWrappers/BackActionTarget.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/Shortcut.php");
require_once(__DIR__."/DataWrappers/RequestMethod.php");
require_once(__DIR__."/DataWrappers/AccessoryIcon.php");
require_once(__DIR__."/DataWrappers/BrowserType.php");
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/Helpers/Authority.php");
require_once(__DIR__."/Helpers/NativeApp.php");
require_once(__DIR__."/Helpers/XModule.php");
require_once(__DIR__."/Helpers/QueryParameters.php");
require_once(__DIR__."/Helpers/Module.php");

use XModule\DataWrappers as DataWrapper;
use XModule\Helpers as Helpers;

class Link implements \JsonSerializable {
    /** @var XString */
	public $relativePath;
    /** @var XString */
	public $external;
    /** @var Module */
	public $module;
    /** @var XModule */
	public $xmodule;
    /** @var Authority */
	public $authority;
    /** @var Shortcut */
	public $shortcut;
    /** @var NativeApp */
	public $nativeApp;
    /** @var XString */
	public $nativePlugin;
    /** @var AccessoryIcon */
	public $accessoryIcon;
    /** @var BrowserType */
	public $browserType;
    /** @var \Boolean */
	public $targetNewWindow;
    /** @var BackActionTarget */
	public $backActionTarget;
    /** @var RequestMethod */
	public $requestMethod;
    /** @var QueryParameters */
	public $postData;
    
	public function __construct() 
	{        
        $this->relativePath = new DataWrapper\XString();
        $this->external = new DataWrapper\XString();
        $this->module = new Helpers\Module();
        $this->xmodule = new Helpers\XModule();
        $this->authority = new Helpers\Authority();
        $this->shortcut = new DataWrapper\Shortcut();
        $this->nativeApp = new Helpers\NativeApp();
        $this->nativePlugin = new DataWrapper\XString();
        $this->accessoryIcon = new DataWrapper\AccessoryIcon();
        $this->browserType = new DataWrapper\BrowserType();
        $this->targetNewWindow = new DataWrapper\Boolean();
        $this->backActionTarget = new DataWrapper\BackActionTarget();
        $this->requestMethod = new DataWrapper\RequestMethod();
        $this->postData = new Helpers\QueryParameters();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'relativePath' => $this->relativePath,
            'external' => $this->external,
            'module' => $this->module,
            'xmodule' => $this->xmodule,
            'authority' => $this->authority,
            'shortcut' => $this->shortcut,
            'nativeApp' => $this->nativeApp,
            'nativePlugin' => $this->nativePlugin,
            
            'accessoryIcon' => $this->accessoryIcon,
            'browserType' => $this->browserType,
            'targetNewWindow' => $this->targetNewWindow,
            'backActionTarget' => $this->backActionTarget,
            'requestMethod' => $this->requestMethod,
            'postData' => $this->postData,
        );
        
        return $format;
    }
}

