<?php
class HorizontalAlignment extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function left (); 
	abstract function center (); 
	abstract function right (); 
}
?>
