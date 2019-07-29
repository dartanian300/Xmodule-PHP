<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

use XModule\DataWrappers as DataWrappers;

class Tab implements \JsonSerializable {
    use \ModifiableArray;
    
    /** @var Title */
	public $title;
    /** @var mixed[] */
	private $content;
    
	public  function __construct() 
	{
//		parent::__construct();
        
        $this->title = new DataWrappers\Title();
        $this->content = array();
	}
    
    /**
     *  Adds an element to the content of Tab.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item, array('ButtonContainer', 'Collapsible', 'Container', 'Detail', 'Form', 'Heading', 'HTML', 'Image', 'XList', 'Table', 'Tabs'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Tab.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('content', $position);
    }
    
    /**
     *  Deletes an element from the content of Tab.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('content', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'title' => $this->title,
            'content' => $this->content,
        );
        
        return $format;
    }
}

