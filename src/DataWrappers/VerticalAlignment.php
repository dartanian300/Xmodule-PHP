<?php
class VerticalAlignment extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function top (); 
	abstract function middle (); 
	abstract function bottom (); 
}
?>
