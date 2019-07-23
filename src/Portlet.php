<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/DataWrappers/Size.php");
require_once(__DIR__."/DataWrappers/Title.php");
require_once(__DIR__."/Traits/ModifiableArray.php");

use XModule\DataWrapper as DataWrapper;
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
    /** @var mixed[] */
	private $content;
    /** @var Size */
	private $height;
	
    
	public function __construct($id = '')
	{
		parent::__construct('portlet', $id);
        
        $this->navbarTitle = new DataWrapper\Title();
        $this->navbarIcon = new DataWrapper\XString();
        $this->navbarLink = new Link();
        $this->forceAjaxOnLoad = new DataWrapper\Boolean();
        $this->content = array();
        $this->height = new DataWrapper\Size();
	}
    
    /**
     *  Adds an element to the content of Portlet.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item);
    }
    
    /**
     *  Returns an element (or all elements) from the content of Portlet.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        $this->getArray('content', $position);
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

