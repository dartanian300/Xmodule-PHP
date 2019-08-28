<?php
namespace XModule\DataWrappers;

class DisclosureIcon extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function plusminus()
    {
        $this->data = 'plusminus';
    }
        
	public function chevron()
    {
        $this->data = 'chevron';
    }
        
}

