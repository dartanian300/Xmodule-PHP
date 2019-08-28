<?php
namespace XModule\DataWrappers;

class HorizontalAlignment extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function left()
    {
        $this->data = 'left';
    }
        
	public function center()
    {
        $this->data = 'center';
    }
        
	public function right()
    {
        $this->data = 'right';
    }
        
}

