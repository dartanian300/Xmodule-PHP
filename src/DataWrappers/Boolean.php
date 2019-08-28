<?php
namespace XModule\DataWrappers;

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

