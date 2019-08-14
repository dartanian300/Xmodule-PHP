<?php
namespace XModule\DataWrappers;

require_once(__DIR__."/XString.php");

class Color extends XString {
	public function __construct($color = '#000000') 
	{
		parent::__construct($color, '/^#[0-9a-f]{6}$/');
	}
}

