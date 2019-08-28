<?php
namespace XModule\DataWrappers;

class AspectRatio extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function sixteenNine()
    {
        $this->data = '16:9';
    }
        
	public function fourThree()
    {
        $this->data = '4:3';
    }
        
	public function oneOne()
    {
        $this->data = '1:1';
    }
        
	public function thirteenFour()
    {
        $this->data = '13:4';
    }
        
	public function nineSixteen()
    {
        $this->data = '9:16';
    }
        
}

