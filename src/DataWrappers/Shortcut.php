<?php
class Shortcut extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function moduleParentHome (); 
	abstract function personaHome (); 
}
?>
