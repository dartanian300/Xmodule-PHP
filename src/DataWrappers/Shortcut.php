<?php
namespace XModule\DataWrappers;

class Shortcut extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function moduleParentHome()
    {
        $this->data = 'moduleParentHome';
    }
    
	public function personaHome()
    {
        $this->data = 'personaHome';
    }
    
}

