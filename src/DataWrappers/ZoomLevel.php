<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/Number.php");

class ZoomLevel extends Number {
	public function __construct() 
	{
		parent::__construct();
        
        $this->min = 0;
        $this->max = 22;
	}
}

