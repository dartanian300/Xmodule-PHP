<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/DataWrapperBase.php");

class BackActionTarget extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function parent()
    {
        $this->data = 'parent';
    }
        
	public function grandparent()
    {
        $this->data = 'grandparent';
    }
        
	public function module()
    {
        $this->data = 'module';
    }
        
	public function home()
    {
        $this->data = 'home';
    }
        
	public function none()
    {
        $this->data = 'none';
    }
        
}

