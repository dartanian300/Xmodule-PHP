<?php
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/Boolean.php");
class Events {
	public $eventName;	// String
	public $targetId;	// String
	public $action;	// String
	public $useRelativePathToUpdate;	// boolean
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
