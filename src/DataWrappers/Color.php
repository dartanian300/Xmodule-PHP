<?php
namespace XModule\DataWrappers;

class Color extends XString {
	public function __construct($color = '#000000') 
	{
		parent::__construct($color, '/^#[0-9a-f]{6}$/');
	}
}

