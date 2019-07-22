<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/DataWrapperBase.php");

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

