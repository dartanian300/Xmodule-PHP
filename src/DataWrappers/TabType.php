<?php
class TabType extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function folder (); 
	abstract function strip (); 
}
?>
