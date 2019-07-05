<?php
class String extends DataWrapperBase {
	protected $format;	// String
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function set ($str); // [string str]
	abstract function validateFormat (); 
}
?>
