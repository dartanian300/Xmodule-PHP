<?php
namespace XModule\DataWrappers;

class AccessoryIconPosition extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function left()
    {
        $this->data = 'left';
    }
    
	public function right()
    {
        $this->data = 'right';
    }
    
}

