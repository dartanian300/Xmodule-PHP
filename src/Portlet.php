<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class Portlet extends Element implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var Title */
	public $navbarTitle;
    /** @var XString */
	public $navbarIcon;
    /** @var Link */
	public $navbarLink;
    /** @var \Boolean */
    public $forceAjaxOnLoad;
    /** @var Size */
	public $height;
    /** @var mixed[] */
	private $content;
	
    
	public function __construct($id = '')
	{
		parent::__construct('portlet', $id);
        
        $this->navbarTitle = new DataWrappers\Title();
        $this->navbarIcon = new DataWrappers\XString();
        $this->navbarLink = new Link();
        $this->forceAjaxOnLoad = new DataWrappers\Boolean();
        $this->height = new DataWrappers\Size();
        $this->content = array();
	}
    
    /**
     *  Adds an element to the content of Portlet.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item, array('ButtonContainer', 'Carousel', 'Collapsible', 'Container', 'Detail', 'Form', 'Tabs', 'Heading', 'HTML', 'Image', 'XList', 'Table'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Portlet.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('content', $position);
    }
    
    /**
     *  Deletes an element from the content of Portlet.
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
            'navbarTitle' => $this->navbarTitle,
            'navbarIcon' => $this->navbarIcon,
            'navbarLink' => $this->navbarLink,
            'content' => $this->content,
            'height' => $this->height,
            'forceAjaxOnLoad' => $this->forceAjaxOnLoad,
        );
        
        return $format;
    }
}

