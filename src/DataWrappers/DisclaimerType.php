<?php
namespace XModule\DataWrappers;

class DisclaimerType extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function header()
    {
        $this->data = 'header';
    }
        
	public function footer()
    {
        $this->data = 'footer';
    }
        
}

