<?php
class TextAlignment extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function left (); 
	abstract function right (); 
	abstract function center (); 
}
?>
