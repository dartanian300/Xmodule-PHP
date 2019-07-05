<?php
class Margins extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function none (); 
	abstract function responsive (); 
	abstract function minimal (); 
}
?>
