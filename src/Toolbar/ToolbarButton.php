<?php
namespace XModule\Toolbar;

use XModule\DataWrappers as DataWrappers;

class ToolbarButton extends \Element implements \JsonSerializable {
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
        
        $this->title = new DataWrappers\Title();
        $this->link = new \Link();
        $this->accessoryIconPosition = new DataWrappers\AccessoryIconPosition();
        $this->actionType = new DataWrappers\ActionType();
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

