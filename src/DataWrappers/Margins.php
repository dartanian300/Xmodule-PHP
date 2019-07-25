<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class Margins extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function none()
    {
        $this->data = 'none';
    }
    
	public function responsive()
    {
        $this->data = 'responsive';
    }
    
	public function minimal()
    {
        $this->data = 'minimal';
    }
}

