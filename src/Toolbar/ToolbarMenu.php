<?php
namespace XModule\Toolbar;

/**
 *  @package Toolbar
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

use XModule\DataWrappers as DataWrappers;

class ToolbarMenu extends \Element implements \JsonSerializable {
    use \ModifiableArray; 
    
    /** @var MenuItem[] */
	private $items;
    
	public function __construct($id = '') 
	{
		parent::__construct('toolbarMenu', $id);
        
        $this->items = array();
	}
    
    /**
     *  Adds an element to the content of ToolbarMenu.
     *  @param mixed $item A MenuItem object to add
     */
    public function add($item)
    {
        $this->addArray('items', $item, 'MenuItem');
    }
    
    /**
     *  Returns an element (or all elements) from the content of ToolbarMenu.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('items', $position);
    }
    
    /**
     *  Deletes an element from the content of ToolbarMenu.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('items', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'items' => $this->items,
        );
        
        return $format;
    }
}

