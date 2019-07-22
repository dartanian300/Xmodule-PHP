<?php
/**
 *  @package Link
 *  
 */
require_once(__DIR__."/DataWrappers/BackActionTarget.php");
require_once(__DIR__."/Helpers/QueryParameters.php");
require_once(__DIR__."/Helpers/Module.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/Shortcut.php");
require_once(__DIR__."/DataWrappers/RequestMethod.php");
require_once(__DIR__."/DataWrappers/AccessoryIcon.php");
require_once(__DIR__."/DataWrappers/BrowserType.php");
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/Helpers/Authority.php");
require_once(__DIR__."/Helpers/NativeApp.php");
require_once(__DIR__."/Helpers/XModule.php");

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
        $this->relativePath = new XString();
        $this->external = new XString();
        $this->module = new Module();
        $this->xmodule = new XModule();
        $this->authority = new Authority();
        $this->shortcut = new Shortcut();
        $this->nativeApp = new NativeApp();
        $this->nativePlugin = new XString();
        $this->accessoryIcon = new AccessoryIcon();
        $this->browserType = new BrowserType();
        $this->targetNewWindow = new Boolean();
        $this->backActionTarget = new BackActionTarget();
        $this->requestMethod = new RequestMethod();
        $this->postData = new QueryParameters();
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

