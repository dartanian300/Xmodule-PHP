<?php
class PostType extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function foreground (); 
	abstract function background (); 
}
?>
