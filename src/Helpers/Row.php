<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class Row implements \JsonSerializable {
    use \ModifiableArray;
    
    /** @var Cell[] */
	private $cells;
    /** @var Link */
	public $link;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->cells = array();
        $this->link = new \Link();
	}
    
    /**
     *  Adds an element to the content of Row.
     *  @param mixed $item A Cell object to add
     */
    public function add($item)
    {
        $this->addArray('cells', $item, '\XModule\Helpers\Cell');
    }
    
    /**
     *  Returns an element (or all elements) from the content of Row.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('cells', $position);
    }
    
    /**
     *  Deletes an element from the content of Row.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('cells', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'cells' => $this->cells,
            'link' => $this->link,
        );
        
        return $format;
    }
}

