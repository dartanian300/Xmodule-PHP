<?php
use XModule\Toolbar;

/**
 *  @package Toolbar
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/AccessoryIconPosition.php");
require_once(__DIR__."/../DataWrappers/ActionType.php");
require_once(__DIR__."/../DataWrappers/Title.php");

class ToolbarButton extends Element implements JsonSerializable {
    /** @var Title */
	public $title;
    /** @var Link */
	public $link;
    /** @var AccessoryIconPosition */
	public $accessoryIconPosition;
    /** @var ActionType */
	public $actionType;
    
	public function __construct($id = '') 
	{
		parent::__construct('toolbarButton', $id);
        
        $this->title = new Title();
        $this->link = new Link();
        $this->accessoryIconPosition = new AccessoryIconPosition();
        $this->actionType = new ActionType();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'title' => $this->title,
            'link' => $this->link,
            'accessoryIconPosition' => $this->accessoryIconPosition,
            'actionType' => $this->actionType,
        );
        
        return $format;
    }
}

