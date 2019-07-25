<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class VerticalAlignment extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function top(){
        $this->data = 'top';
    }
    
	public function middle()
    {
        $this->data = 'middle';
    }
    
	public function bottom()
    {
        $this->data = 'bottom';
    }
}

