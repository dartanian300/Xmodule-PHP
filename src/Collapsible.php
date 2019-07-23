<?php
/**

@todo if ModifiableArray works, remove add/get/remove methods from Class Diagram

 *  @package Elements
 *
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/Traits/ModifiableArray.php");
require_once(__DIR__."/DataWrappers/DisclosureIcon.php");
require_once(__DIR__."/DataWrappers/Title.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;

/**
 *  Summary.
 *  Description.
 *  @method void add(mixed $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class Collapsible extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var Title */
	public $title;
    /** @var \Boolean */
	public $collapsed;
    /** @var DisclosureIcon */
	public $disclosureIcon;
    /** @var mixed[] */
	private $content;
    
	public function __construct($id = '')
	{
		parent::__construct('collapsible', $id);
        
        $this->title = new DataWrapper\Title();
        $this->collapsed = new DataWrapper\Boolean();
        $this->disclosureIcon = new DataWrapper\DisclosureIcon();
        $this->content = array();
	}
    
    /**
     *  Adds an element to the content of Collapsible.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item);
    }
    
    /**
     *  Returns an element (or all elements) from the content of Collapsible.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        $this->getArray('content', $position);
    }
    
    /**
     *  Deletes an element from the content of Collapsible.
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
            'title' => $this->title,
            'collapsed' => $this->collapsed,
            'disclosureIcon' => $this->disclosureIcon,
            'content' => $this->content
        );
        
        return $format;
    }
}

