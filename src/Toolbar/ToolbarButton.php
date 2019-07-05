<?php
require_once("model/Link.php");
require_once("model/DataWrappers/AccessoryIconPosition.php");
require_once("model/DataWrappers/ActionType.php");
require_once("model/DataWrappers/Title.php");
require_once("model/Element.php");
class ToolbarButton extends Element {
	public $title;	// Title
	public $link;	// Link
	public $accessoryIconPosition;	// AccessoryIconPosition
	public $actionType;	// ActionType
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
