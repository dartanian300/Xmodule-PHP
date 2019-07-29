<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/TabType.php");
require_once(__DIR__."/Traits/ModifiableArray.php");

use XModule\DataWrappers as DataWrapper;
use XModule\Helpers as Helpers;

class Tabs extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var Tab[] */
	private $tabs;
    /** @var TabType */
	public $tabType;
    /** @var \Boolean */
	public $forceAjaxOnLoad;
    
	public function __construct($id = '')
	{
		parent::__construct('tabs', $id);
        
        $this->tabs = array();
        $this->tabType = new DataWrapper\TabType();
        $this->forceAjaxOnLoad = new DataWrapper\Boolean();
	}
    
    /**
     *  Adds an element to the content of Tabs.
     *  @param mixed $item A Tab object to add
     */
    public function add($item)
    {
        $this->addArray('tabs', $item, 'Tab');
    }
    
    /**
     *  Returns an element (or all elements) from the content of Tabs.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('tabs', $position);
    }
    
    /**
     *  Deletes an element from the content of Tabs.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('tabs', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'tabs' => $this->tabs,
            'tabType' => $this->tabType,
            'forceAjaxOnLoad' => $this->forceAjaxOnLoad,
        );
        
        return $format;
    }
}

