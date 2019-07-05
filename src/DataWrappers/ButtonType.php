<?php
class ButtonType extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function submit (); 
	abstract function reset (); 
}
?>
