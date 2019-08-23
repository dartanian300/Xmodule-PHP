<?php

require_once(__DIR__.'/../src/Link.php');

use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase{
    public static $obj;

    // Setup object for testing
    public static function setUpBeforeClass(): void
    {
        self::$obj = new Link();
    }
    
    public function testProperties()
    {
        $this->assertClassHasAttribute('relativePath', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->relativePath);
        
        $this->assertClassHasAttribute('external', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->external);
        
        $this->assertClassHasAttribute('module', Link::class);
        $this->assertInstanceOf(\XModule\Helpers\Module::class, self::$obj->module);
        
        $this->assertClassHasAttribute('xmodule', Link::class);
        $this->assertInstanceOf(\XModule\Helpers\XModule::class, self::$obj->xmodule);
        
        $this->assertClassHasAttribute('authority', Link::class);
        $this->assertInstanceOf(\XModule\Helpers\Authority::class, self::$obj->authority);
        
        $this->assertClassHasAttribute('shortcut', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Shortcut::class, self::$obj->shortcut);
        
        $this->assertClassHasAttribute('nativeApp', Link::class);
        $this->assertInstanceOf(\XModule\Helpers\NativeApp::class, self::$obj->nativeApp);
        
        $this->assertClassHasAttribute('nativePlugin', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\XString::class, self::$obj->nativePlugin);
                
        $this->assertClassHasAttribute('accessoryIcon', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\AccessoryIcon::class, self::$obj->accessoryIcon);
        
        $this->assertClassHasAttribute('browserType', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\BrowserType::class, self::$obj->browserType);
        
        $this->assertClassHasAttribute('targetNewWindow', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\Boolean::class, self::$obj->targetNewWindow);
        
        $this->assertClassHasAttribute('backActionTarget', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\BackActionTarget::class, self::$obj->backActionTarget);
        
        $this->assertClassHasAttribute('requestMethod', Link::class);
        $this->assertInstanceOf(\XModule\DataWrappers\RequestMethod::class, self::$obj->requestMethod);
        
        $this->assertClassHasAttribute('postData', Link::class);
        $this->assertInstanceOf(\XModule\Helpers\QueryParameters::class, self::$obj->postData);
    }
    
}