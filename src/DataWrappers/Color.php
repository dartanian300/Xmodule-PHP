<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/XString.php");

class Color extends XString {
	public function __construct($color) 
	{
		parent::__construct($color, '/#[0-9a-z]{6}/');
	}
}

