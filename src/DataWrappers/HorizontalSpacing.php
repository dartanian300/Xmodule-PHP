<?php
namespace XModule\DataWrappers;

class HorizontalSpacing extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function extraTight()
    {
        $this->data = 'extraTight';
    }
        
	public function tight()
    {
        $this->data = 'tight';
    }
        
	public function normal()
    {
        $this->data = 'normal';
    }
        
	public function loose()
    {
        $this->data = 'loose';
    }
        
}

