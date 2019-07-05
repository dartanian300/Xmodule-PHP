<?php
class Module {
	public $id;	// String
	public $page;	// String
	public $queryParameters;	// QueryParameters
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
