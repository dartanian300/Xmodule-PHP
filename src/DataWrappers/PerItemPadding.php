<?php
namespace XModule\DataWrappers;

class PerItemPadding extends DataWrapperBase {
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
    
	public function extraLoose()
    {
        $this->data = 'extraLoose';
    }
    
}

