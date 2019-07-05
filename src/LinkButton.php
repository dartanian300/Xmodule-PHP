<?php
require_once("model/DataWrappers/AccessoryIconPosition.php");
require_once("model/DataWrappers/String.php");
require_once("model/DataWrappers/ActionType.php");
require_once("model/DataWrappers/Boolean.php");
require_once("model/DataWrappers/Title.php");
class LinkButton extends Element {
	public $title;	// Title
	public $link;	// Link
	public $disabled;	// boolean
	public $accessoryIconPosition;	// AccessoryIconPosition
	public $actionType;	// ActionType
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
