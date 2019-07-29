<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/Traits/ModifiableArray.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class ButtonContainer extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var mixed[] Can contain formButtons or linkButtons */
	private $buttons;
    
	public function __construct($id = '')
	{
		parent::__construct('buttonContainer', $id);
        
        $this->buttons = array();
	}
    
    /**
     *  Adds an element to the content of ButtonContainer.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('buttons', $item, array('FormButton', 'LinkButton'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of ButtonContainer.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('buttons', $position);
    }
    
    /**
     *  Deletes an element from the content of ButtonContainer.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('buttons', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'buttons' => $this->buttons,
        );
        
        return $format;
    }
}

