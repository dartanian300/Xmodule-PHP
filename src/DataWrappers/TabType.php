<?php
namespace XModule\DataWrappers;

class TabType extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function folder()
    {
        $this->data = 'folder';
    }
        
	public function strip()
    {
        $this->data = 'strip';
    }
        
}

