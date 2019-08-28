<?php
namespace XModule\DataWrappers;

class ButtonType extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function submit(){
        $this->data = 'submit';
    }
    
	public function reset(){
        $this->data = 'reset';
    }
}

