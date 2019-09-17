<?php
use XModule\DataWrappers as DataWrappers;
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
    /** @var NativePlugin */
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
        $this->relativePath = new DataWrappers\XString();
        $this->external = new DataWrappers\XString();
        $this->module = new Helpers\Module();
        $this->xmodule = new Helpers\XModule();
        $this->authority = new Helpers\Authority();
        $this->shortcut = new Helpers\Shortcut();
        $this->nativeApp = new Helpers\NativeApp();
        $this->nativePlugin = new Helpers\NativePlugin();
        $this->accessoryIcon = new DataWrappers\AccessoryIcon();
        $this->browserType = new DataWrappers\BrowserType();
        $this->targetNewWindow = new DataWrappers\Boolean();
        $this->backActionTarget = new DataWrappers\BackActionTarget();
        $this->requestMethod = new DataWrappers\RequestMethod();
        $this->postData = new Helpers\QueryParameters();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
//            'relativePath' => $this->relativePath,
//            'external' => $this->external,
//            'module' => $this->module,
//            'xmodule' => $this->xmodule,
//            'authority' => $this->authority,
//            'shortcut' => $this->shortcut,
//            'nativeApp' => $this->nativeApp,
//            'nativePlugin' => $this->nativePlugin,
            
//            'accessoryIcon' => $this->accessoryIcon,
//            'browserType' => $this->browserType,
//            'targetNewWindow' => $this->targetNewWindow,
//            'backActionTarget' => $this->backActionTarget,
//            'requestMethod' => $this->requestMethod,
//            'postData' => $this->postData,
        );
        
        if (!empty($this->relativePath->get()))
            $format['relativePath'] = $this->relativePath;
        
        if (!empty($this->external->get()))
            $format['external'] = $this->external;
        
        if (!empty($this->module->id->get()))
            $format['module'] = $this->module;  //
        
        if (!empty($this->xmodule->id->get()))
            $format['xmodule'] = $this->xmodule;    //
        
        if (!empty($this->authority->type->get()))
            $format['authority'] = $this->authority;    //
        
        if (!empty($this->shortcut->type->get()))
            $format['shortcut'] = $this->shortcut;  
        
        if (!empty($this->nativeApp->nativeAppURL->get()))
            $format['nativeApp'] = $this->nativeApp;    //
        
        if (!empty($this->nativePlugin->id->get()))
            $format['nativePlugin'] = $this->nativePlugin;    //
        
        
        
        if (!empty($this->accessoryIcon->get()))
            $format['accessoryIcon'] = $this->accessoryIcon;
        
        if (!empty($this->browserType->get()))
            $format['browserType'] = $this->browserType;
        
        if (is_bool($this->targetNewWindow->get()))
            $format['targetNewWindow'] = $this->targetNewWindow;
        
        if (!empty($this->backActionTarget->get()))
            $format['backActionTarget'] = $this->backActionTarget;
        
        if (!empty($this->requestMethod->get()))
            $format['requestMethod'] = $this->requestMethod;
        
        if (!empty($this->postData->get()))
            $format['postData'] = $this->postData;
        
        return $format;
    }
}

