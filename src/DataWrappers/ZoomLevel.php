<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/Number.php");

class ZoomLevel extends Number {
	public function __construct() 
	{
		parent::__construct();
        
        $this->setMin(0);
        $this->setMax(22);
	}
}

