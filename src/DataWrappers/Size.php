<?php
namespace XModule\DataWrapper;

/**
    @todo resolve conflict between this Size and Size inside of Map Package
*/
require_once(__DIR__."/DataWrapperBase.php");

class Size extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function xsmall()
    {
        $this->data = 'xsmall';
    }
    
	public function small()
    {
        $this->data = 'small';
    }
    
	public function medium()
    {
        $this->data = 'medium';
    }
    
	public function large()
    {
        $this->data = 'large';
    }
    
	public function xlarge()
    {
        $this->data = 'xlarge';
    }
    
	public function auto()
    {
        $this->data = 'auto';
    }
}

