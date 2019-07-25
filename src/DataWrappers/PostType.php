<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class PostType extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function foreground()
    {
        $this->data = 'foreground';
    }
        
	public function background()
    {
        $this->data = 'background';
    }
}

