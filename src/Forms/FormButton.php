<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../DataWrappers/AccessoryIconPosition.php");
require_once(__DIR__."/../DataWrappers/ActionType.php");
require_once(__DIR__."/../DataWrappers/AccessoryIcon.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../DataWrappers/ButtonType.php");

use XModule\DataWrapper as DataWrapper;

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
        
        $this->title = new DataWrapper\Title();
        $this->buttonType = new DataWrapper\ButtonType();
        $this->accessoryIcon = new DataWrapper\AccessoryIcon();
        $this->accessoryIconPosition = new DataWrapper\AccessoryIconPosition();
        $this->actionType = new DataWrapper\ActionType();
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

