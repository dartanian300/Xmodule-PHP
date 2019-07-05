<?php
class Number extends DataWrapperBase {
	protected $min;	// number
	protected $max;	// number
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function set ($num); // [number num]
}
?>
