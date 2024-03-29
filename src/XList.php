<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class XList extends Element implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var XString */
	public $heading;
    /** @var \Boolean */
	public $grouped;
    /** @var ListItem[] */
	private $items;
    
	public function __construct($id = '')
	{
		parent::__construct('list', $id);
        
        $this->heading = new DataWrappers\XString();
        $this->grouped = new DataWrappers\Boolean();
        $this->items = array();
	}
    
    /**
     *  Adds an element to the content of List.
     *  @param mixed $item A ListItem object to add
     */
    public function add($item)
    {
        $this->addArray('items', $item, 'XModule\Helpers\ListItem');
    }
    
    /**
     *  Returns an element (or all elements) from the content of List.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('items', $position);
    }
    
    /**
     *  Deletes an element from the content of List.
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
            'heading' => $this->heading,
            'grouped' => $this->grouped,
            'items' => $this->items,
        );
        
        return $format;
    }
}

