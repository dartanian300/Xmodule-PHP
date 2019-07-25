<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/DataWrapperBase.php");

class AspectRatio extends DataWrapperBase {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function sixteenNine()
    {
        $this->data = 'sixteenNine';
    }
        
	public function fourThree()
    {
        $this->data = 'fourThree';
    }
        
	public function oneOne()
    {
        $this->data = 'oneOne';
    }
        
	public function thirteenFour()
    {
        $this->data = 'thirteenFour';
    }
        
	public function nineSixteen()
    {
        $this->data = 'nineSixteen';
    }
        
}

