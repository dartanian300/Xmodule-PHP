<?php
namespace XModule\DataWrappers;

class TextAlignment extends DataWrapperBase {
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
    
	public function center()
    {
        $this->data = 'center';
    }
    
}

