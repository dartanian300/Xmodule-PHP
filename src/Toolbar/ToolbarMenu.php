<?php
use XModule\Toolbar;

/**
 *  @package Toolbar
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

/**
 *  Summary.
 *  Description.
 *  @method void add(mixed $row)
 *  @method MenuItem get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class ToolbarMenu extends Element implements JsonSerializable {
    use ModifiableArray; 
    
    /** @var MenuItem[] */
	private $items;
    
	public function __construct($id = '') 
	{
		parent::__construct('toolbarMenu', $id);
        $this->setModifiableProperties(array('items'));
        
        $this->items = array();
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

