<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/PerItemPadding.php");
require_once(__DIR__."/DataWrappers/ContainerPadding.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/HorizontalAlignment.php");
require_once(__DIR__."/DataWrappers/HorizontalSpacing.php");
require_once(__DIR__."/Traits/ModifiableArray.php");

use XModule\DataWrappers as DataWrapper;
use XModule\Helpers as Helpers;

class Grid extends Element implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var HorizontalSpacing */
	public $horizontalSpacing;
    /** @var HorizontalAlignment */
	public $horizontalAlignment;
    /** @var ContainerPadding */
	public $containerPadding;
    /** @var PerItemPadding */
	public $perItemPadding;
    /** @var \Boolean */
	public $suppressVisibleLabels;
    /** @var GridItem[] */
	private $items;
    
	public function __construct($id = '')
	{
		parent::__construct('grid', $id);
        
        $this->horizontalSpacing = new DataWrapper\HorizontalSpacing();
        $this->horizontalAlignment = new DataWrapper\HorizontalAlignment();
        $this->containerPadding = new DataWrapper\ContainerPadding();
        $this->perItemPadding = new DataWrapper\PerItemPadding();
        $this->suppressVisibleLabels = new DataWrapper\Boolean();
        $this->items = array();
	}
    
    /**
     *  Adds an element to the content of Grid.
     *  @param mixed $item A GridItem object to add
     */
    public function add($item)
    {
        $this->addArray('items', $item, 'GridItem');
    }
    
    /**
     *  Returns an element (or all elements) from the content of Grid.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('items', $position);
    }
    
    /**
     *  Deletes an element from the content of Grid.
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
            'id' => $this->id,
            'horizontalSpacing' => $this->horizontalSpacing,
            'horizontalAlignment' => $this->horizontalAlignment,
            'containerPadding' => $this->containerPadding,
            'perItemPadding' => $this->perItemPadding,
            'suppressVisibleLabels' => $this->suppressVisibleLabels,
            'items' => $this->items,
        );
        
        return $format;
    }
}

