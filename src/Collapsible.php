<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

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
        
        $this->title = new DataWrappers\Title();
        $this->collapsed = new DataWrappers\Boolean();
        $this->disclosureIcon = new DataWrappers\DisclosureIcon();
        $this->content = array();
	}
    
    /**
     *  Adds an element to the content of Collapsible.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item, array('ButtonContainer', 'Container', 'Form', 'Heading', 'HTML', 'Image', 'Checkbox', 'Email', 'HiddenField', 'Label', 'Password', 'Phone', 'RadioButtons', 'SelectMenu', 'TextInput', 'TextArea', 'Upload', 'XList', 'Table'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Collapsible.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('content', $position);
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

