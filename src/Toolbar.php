<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class Toolbar extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var mixed[] Elements can be ToolbarButton, ToolbarLabel and ToolbarMenu */
	private $left;
    /** @var mixed[] Elements can be ToolbarButton, ToolbarLabel and ToolbarMenu */
	private $middle;
    /** @var mixed[] Elements can be ToolbarButton, ToolbarLabel and ToolbarMenu */
	private $right;
    
	public function __construct($id = '')
	{
		parent::__construct('toolbar', $id);
        
        $this->left = array();
        $this->middle = array();
        $this->right = array();
	}
    
    /**
     *  Adds an element to the content of Toolbar.
     *  @param mixed $item A ToolbarButton, ToolbarLabel or ToolbarMenu object to add
     */
    public function addLeft($item)
    {
        $this->addArray('left', $item, array('XModule\Toolbar\ToolbarButton', 'XModule\Toolbar\ToolbarLabel', 'XModule\Toolbar\ToolbarMenu'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Toolbar.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getLeft($position = null)
    {
        return $this->getArray('left', $position);
    }
    
    /**
     *  Deletes an element from the content of Toolbar.
     *  @param int $position The element position to delete
     */
    public function deleteLeft($position)
    {
        $this->deleteArray('left', $position);
    }
    
    /**
     *  Adds an element to the content of Toolbar.
     *  @param mixed $item A ToolbarButton, ToolbarLabel or ToolbarMenu object to add
     */
    public function addMiddle($item)
    {
        $this->addArray('middle', $item, array('XModule\Toolbar\ToolbarButton', 'XModule\Toolbar\ToolbarLabel', 'XModule\Toolbar\ToolbarMenu'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Toolbar.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getMiddle($position = null)
    {
        return $this->getArray('middle', $position);
    }
    
    /**
     *  Deletes an element from the content of Toolbar.
     *  @param int $position The element position to delete
     */
    public function deleteMiddle($position)
    {
        $this->deleteArray('middle', $position);
    }
    
    /**
     *  Adds an element to the content of Toolbar.
     *  @param mixed $item A ToolbarButton, ToolbarLabel or ToolbarMenu object to add
     */
    public function addRight($item)
    {
        $this->addArray('right', $item, array('XModule\Toolbar\ToolbarButton', 'XModule\Toolbar\ToolbarLabel', 'XModule\Toolbar\ToolbarMenu'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Toolbar.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getRight($position = null)
    {
        return $this->getArray('right', $position);
    }
    
    /**
     *  Deletes an element from the content of Toolbar.
     *  @param int $position The element position to delete
     */
    public function deleteRight($position)
    {
        $this->deleteArray('right', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'left' => $this->left,
            'middle' => $this->middle,
            'right' => $this->right,
        );
        
        return $format;
    }
}

