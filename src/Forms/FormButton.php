<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

class FormButton extends FormElement implements \JsonSerializable {
    /** @var Title */
	public $title;
    /** @var ButtonType */
	public $buttonType;
    /** @var AccessoryIcon */
	public $accessoryIcon;
    /** @var AccessoryIconPosition */
	public $accessoryIconPosition;
    /** @var ActionType */
	public $actionType;
    
	public function __construct()
	{
		parent::__construct('', 'formButton');
        
        $this->title = new DataWrappers\Title();
        $this->buttonType = new DataWrappers\ButtonType();
        $this->accessoryIcon = new DataWrappers\AccessoryIcon();
        $this->accessoryIconPosition = new DataWrappers\AccessoryIconPosition();
        $this->actionType = new DataWrappers\ActionType();
	}
    
    public function jsonSerialize()
    {        
        if ($this->title->get() === null)
            throw new Exceptions\RequiredProperty('title', __CLASS__);
        
        $format = array(
            'elementType' => $this->elementType,
            'title' => $this->title,
            'name' => $this->name,
            'buttonType' => $this->buttonType,
            'accessoryIcon' => $this->accessoryIcon,
            'accessoryIconPosition' => $this->accessoryIconPosition,
            'actionType' => $this->actionType,
        );
        
        return $format;
    }
}

