<?php
class Collage {
	public  function __construct() 
	{
		$me = new self();
		parent::__construct();
		return $me;
	}
}

