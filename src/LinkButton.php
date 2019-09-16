<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class LinkButton extends Element implements \JsonSerializable {    
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
    public $events;
    
	public function __construct($id = '')
	{
		parent::__construct('linkButton', $id);
        
        $this->title = new DataWrappers\Title();
        $this->link = new Link();
        $this->disabled = new DataWrappers\Boolean();
        $this->accessoryIconPosition = new DataWrappers\AccessoryIconPosition();
        $this->actionType = new DataWrappers\ActionType();
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
            'actionType' => $this->actionType
        );
        
        if (!empty($this->events->eventName->get()))
            $format['events'] = $this->events;
        
        return $format;
    }
}

