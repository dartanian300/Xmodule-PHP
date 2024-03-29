<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;
use XModule\Exceptions as Exceptions;

class ToolbarContent extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var MenuPosition */
	public $menuPosition;
    /** @var Number */
	public $ajaxUpdateInterval;
    /** @var MenuItem[] */
	private $menuItems;
    /** @var mixed[] Elements can be ToolbarButton and ToolbarLabel */
	private $left;
    /** @var mixed[] Elements can be ToolbarButton and ToolbarLabel  */
	private $middle;
    /** @var mixed[] Elements can be ToolbarButton and ToolbarLabel  */
	private $right;
    
	public function __construct($id = '') // [String id]
	{
		parent::__construct('toolbarContentAjax', $id);
        
        $this->menuPosition =  new DataWrappers\MenuPosition();
        $this->ajaxUpdateInterval = new DataWrappers\Number();
        $this->menuItems = array();
        $this->left = array();
        $this->middle = array();
        $this->right = array();
	}
    
    /**
     *  Adds an element to the content of ToolbarContent.
     *  @param mixed $item A ToolbarButton or ToolbarLabel object to add
     */
    public function addLeft($item)
    {
        $this->addArray('left', $item, array('XModule\Toolbar\ToolbarButton', 'XModule\Toolbar\ToolbarLabel'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of ToolbarContent.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getLeft($position = null)
    {
        return $this->getArray('left', $position);
    }
    
    /**
     *  Deletes an element from the content of ToolbarContent.
     *  @param int $position The element position to delete
     */
    public function deleteLeft($position)
    {
        $this->deleteArray('left', $position);
    }
    
    /**
     *  Adds an element to the content of ToolbarContent.
     *  @param mixed $item A ToolbarButton or ToolbarLabel object to add
     */
    public function addMiddle($item)
    {
        $this->addArray('middle', $item, array('XModule\Toolbar\ToolbarButton', 'XModule\Toolbar\ToolbarLabel'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of ToolbarContent.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getMiddle($position = null)
    {
        return $this->getArray('middle', $position);
    }
    
    /**
     *  Deletes an element from the content of ToolbarContent.
     *  @param int $position The element position to delete
     */
    public function deleteMiddle($position)
    {
        $this->deleteArray('middle', $position);
    }
    
    /**
     *  Adds an element to the content of ToolbarContent.
     *  @param mixed $item A ToolbarButton or ToolbarLabel object to add
     */
    public function addRight($item)
    {
        $this->addArray('right', $item, array('XModule\Toolbar\ToolbarButton', 'XModule\Toolbar\ToolbarLabel'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of ToolbarContent.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getRight($position = null)
    {
        return $this->getArray('right', $position);
    }
    
    /**
     *  Deletes an element from the content of ToolbarContent.
     *  @param int $position The element position to delete
     */
    public function deleteRight($position)
    {
        $this->deleteArray('right', $position);
    }
    
    /**
     *  Adds an element to the content of ToolbarContent.
     *  @param mixed $item A MenuItem object to add
     */
    public function addMenuItem($item)
    {
        $this->addArray('menuItems', $item, 'XModule\Toolbar\MenuItem');
    }
    
    /**
     *  Returns an element (or all elements) from the content of ToolbarContent.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getMenuItem($position = null)
    {
        return $this->getArray('menuItems', $position);
    }
    
    /**
     *  Deletes an element from the content of ToolbarContent.
     *  @param int $position The element position to delete
     */
    public function deleteMenuItem($position)
    {
        $this->deleteArray('menuItems', $position);
    }
    
    public function jsonSerialize()
    {        
        if ($this->menuPosition->get() === null)
            throw new Exceptions\RequiredProperty('menuPosition', __CLASS__);
        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'menuItems' => $this->menuItems,
            'menuPosition' => $this->menuPosition,
            'ajaxUpdateInterval' => $this->ajaxUpdateInterval,
            'left' => $this->left,
            'middle' => $this->middle,
            'right' => $this->right,
        );
        
        return $format;
    }
}

