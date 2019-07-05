<?php
class RequestMethod extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function get (); 
	abstract function post (); 
}
?>
