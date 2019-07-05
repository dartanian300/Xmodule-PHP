<?php
class DisclosureIcon extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function plusminus (); 
	abstract function chevron (); 
}
?>
