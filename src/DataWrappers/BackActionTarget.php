<?php
class BackActionTarget extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function parent (); 
	abstract function grandparent (); 
	abstract function module (); 
	abstract function home (); 
	abstract function none (); 
}
?>
