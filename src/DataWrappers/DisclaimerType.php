<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/DataWrapperBase.php");

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

