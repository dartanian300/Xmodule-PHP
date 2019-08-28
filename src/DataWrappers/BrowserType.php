<?php
namespace XModule\DataWrappers;

class BrowserType extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function appModal()
    {
        $this->data = 'appModal';
    } 
    
	public function appScreen()
    {
        $this->data = 'appScreen';
    } 
    
	public function systemBrowserEmbedded()
    {
        $this->data = 'systemBrowserEmbedded';
    } 
    
	public function systemBrowserExternal()
    {
        $this->data = 'systemBrowserExternal';
    } 
    
	public function operation()
    {
        $this->data = 'operation';
    } 
}

