<?php
class Size extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function xsmall (); 
	abstract function small (); 
	abstract function medium (); 
	abstract function large (); 
	abstract function xlarge (); 
	abstract function auto (); 
}
?>
