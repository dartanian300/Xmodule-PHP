<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/Link.php");
require_once(__DIR__."/DataWrappers/AccessoryIconPosition.php");
require_once(__DIR__."/DataWrappers/ActionType.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/Title.php");
require_once(__DIR__."/Events.php");

class LinkButton extends Element implements JsonSerializable {    
    /** @var Title */
	public $title;
    /** @var Link */
	public $link;
    /** @var \Boolean */
	public $disabled;
    /** @var AccessoryIconPosition */
	public $accessoryIconPosition;
    /** @var ActionType */
	public $actionType;
    /** @var Events */
    private $events;
    
	public function __construct($id = '')
	{
		parent::__construct('linkButton', $id);
        
        $this->title = new Title();
        $this->link = new Link();
        $this->disabled = new Boolean();
        $this->accessoryIconPosition = new AccessoryIconPosition();
        $this->actionType = new actionType();
        $this->events = new Events();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'disabled' => $this->disabled,
            'accessoryIconPosition' => $this->accessoryIconPosition,
            'actionType' => $this->actionType,
            'events' => $this->events
        );
        
        return $format;
    }
}

