<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class MenuPosition extends DataWrapperBase {
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

