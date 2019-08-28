<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class Container extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var mixed[] */
	private $content;
    /** @var \Boolean */
	public $hidden;
    /** @var Margins */
	public $margins;
    
	public function __construct($id = '')
	{
		parent::__construct('container', $id);
        
        $this->content = array();
        $this->hidden = new DataWrappers\Boolean();
        $this->margins = new DataWrappers\Margins();
	}
    
    /**
     *  Adds an element to the content of Container.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item, array('ButtonContainer', 'Collapsible', 'Container', 'Form', 'GoogleMap', 'Grid', 'Heading', 'HTML', 'Image', 'Portlet', 'Table', 'Tabs'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Container.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('content', $position);
    }
    
    /**
     *  Deletes an element from the content of Container.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('content', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'hidden' => $this->hidden,
            'margins' => $this->margins,
            'content' => $this->content
        );
        
        return $format;
    }
}

