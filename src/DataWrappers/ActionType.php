<?php
namespace XModule\DataWrappers;

class ActionType extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function constructive()
    {
        $this->data = 'constructive';
    }
        
	public function destructive()
    {
        $this->data = 'destructive';
    }
        
	public function emphasized()
    {
        $this->data = 'emphasized';
    }
        
}

