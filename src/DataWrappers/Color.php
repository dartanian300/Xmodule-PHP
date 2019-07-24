<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/XString.php");

/**
 *  @todo Enforce color format (hex)
 */
class Color extends XString {
	public function __construct($color) 
	{
		parent::__construct($color, '/#[0-9a-z]{6}/');
	}
}

