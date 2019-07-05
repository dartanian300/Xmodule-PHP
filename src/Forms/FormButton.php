<?php
require_once("model/DataWrappers/AccessoryIconPosition.php");
require_once("model/DataWrappers/ActionType.php");
require_once("model/DataWrappers/AccessoryIcon.php");
require_once("model/DataWrappers/Title.php");
require_once("model/DataWrappers/ButtonType.php");
class FormButton extends FormElement {
	public $title;	// Title
	public $buttonType;	// ButtonType
	public $accessoryIcon;	// AccessoryIcon
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
