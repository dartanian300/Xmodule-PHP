<?php
namespace XModule\DataWrappers;

class ZoomLevel extends Number {
	public function __construct() 
	{
		parent::__construct();
        
        $this->setMin(0);
        $this->setMax(22);
	}
}

