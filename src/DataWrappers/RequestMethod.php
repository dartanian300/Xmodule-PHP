<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class RequestMethod extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function setGet()
    {
        $this->data = 'get';
    }
        
	public function setPost()
    {
        $this->data = 'post';
    }
        
}

