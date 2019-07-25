<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

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

