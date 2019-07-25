<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class Boolean extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function true()
    {
        $this->data = true;
    }
        
	public function false()
    {
        $this->data = false;
    }
        
}

