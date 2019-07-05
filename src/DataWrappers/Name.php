<?php
class Name extends String {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
