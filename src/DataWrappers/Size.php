<?php
namespace XModule\DataWrappers;

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

