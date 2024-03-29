<?php
use XModule\DataWrappers as DataWrappers;
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
        
        $this->horizontalSpacing = new DataWrappers\HorizontalSpacing();
        $this->horizontalAlignment = new DataWrappers\HorizontalAlignment();
        $this->containerPadding = new DataWrappers\ContainerPadding();
        $this->perItemPadding = new DataWrappers\PerItemPadding();
        $this->suppressVisibleLabels = new DataWrappers\Boolean();
        $this->items = array();
	}
    
    /**
     *  Adds an element to the content of Grid.
     *  @param mixed $item A GridItem object to add
     */
    public function add($item)
    {
        $this->addArray('items', $item, '\XModule\Helpers\GridItem');
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

