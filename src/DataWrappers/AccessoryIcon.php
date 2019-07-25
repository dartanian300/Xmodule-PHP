<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class AccessoryIcon extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function drilldown()
    {
        $this->data = 'drilldown';
    }
        
	public function phone()
    {
        $this->data = 'phone';
    }
        
	public function sms()
    {
        $this->data = 'sms';
    }
        
	public function comment()
    {
        $this->data = 'comment';
    }
        
	public function email()
    {
        $this->data = 'email';
    }
        
	public function email_open()
    {
        $this->data = 'email_open';
    }
        
	public function reply()
    {
        $this->data = 'reply';
    }
        
	public function calendar()
    {
        $this->data = 'calendar';
    }
        
	public function people()
    {
        $this->data = 'people';
    }
        
	public function map()
    {
        $this->data = 'map';
    }
        
	public function secure()
    {
        $this->data = 'secure';
    }
        
	public function unlock()
    {
        $this->data = 'unlock';
    }
        
	public function external()
    {
        $this->data = 'external';
    }
        
	public function attachment()
    {
        $this->data = 'attachment';
    }
        
	public function download()
    {
        $this->data = 'download';
    }
        
	public function upload()
    {
        $this->data = 'upload';
    }
        
	public function camera()
    {
        $this->data = 'camera';
    }
        
	public function print()
    {
        $this->data = 'print';
    }
        
	public function favorite()
    {
        $this->data = 'favorite';
    }
        
	public function bookmark()
    {
        $this->data = 'bookmark';
    }
        
	public function share()
    {
        $this->data = 'share';
    }
        
	public function rotate()
    {
        $this->data = 'rotate';
    }
        
	public function plus()
    {
        $this->data = 'plus';
    }
        
	public function minus()
    {
        $this->data = 'minus';
    }
        
	public function button_add()
    {
        $this->data = 'button_add';
    }
        
	public function button_remove()
    {
        $this->data = 'button_remove';
    }
        
	public function flag()
    {
        $this->data = 'flag';
    }
        
	public function delete()
    {
        $this->data = 'delete';
    }
        
	public function reset()
    {
        $this->data = 'reset';
    }
        
	public function reload()
    {
        $this->data = 'reload';
    }
        
	public function like()
    {
        $this->data = 'like';
    }
        
	public function unlike()
    {
        $this->data = 'unlike';
    }
        
	public function checkbox()
    {
        $this->data = 'checkbox';
    }
        
	public function checkbox_on()
    {
        $this->data = 'checkbox_on';
    }
        
	public function previous()
    {
        $this->data = 'previous';
    }
        
	public function next()
    {
        $this->data = 'next';
    }
        
	public function none()
    {
        $this->data = 'none';
    }
        
}

