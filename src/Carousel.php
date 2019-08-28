<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class Carousel extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var CarouselItem[] */
	private $items;
    
	public function __construct($id = '')
	{
		parent::__construct('carousel', $id);
        
        $this->items = array();
	}
    
    /**
     *  Adds an element to the content of Carousel.
     *  @param mixed $item A CarouselItem object to add
     */
    public function add($item)
    {
        $this->addArray('items', $item, '\XModule\Helpers\CarouselItem');
    }
    
    /**
     *  Returns an element (or all elements) from the content of Carousel.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('items', $position);
    }
    
    /**
     *  Deletes an element from the content of Carousel.
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
            'items' => $this->items,
        );
        
        return $format;
    }
}

