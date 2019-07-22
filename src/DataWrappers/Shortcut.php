<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/DataWrapperBase.php");

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

