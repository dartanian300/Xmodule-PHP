<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

class Form extends Element implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var XString */
	public $relativePath;
    /** @var RequestMethod */
	public $requestMethod;
    /** @var PostType */
	public $postType;
    /** @var XString */
	public $heading;
    /** @var \Boolean */
	public $disableScrim;
    /** @var XString */
	public $loadingTitle;
    /** @var mixed[] */
    private $items;
    /** @var Events */
    public $events;
    
	public function __construct($id = '')
	{
		parent::__construct('form', $id);
        
        $this->relativePath = new DataWrappers\XString();
        $this->requestMethod = new DataWrappers\RequestMethod();
        $this->postType = new DataWrappers\PostType();
        $this->heading = new DataWrappers\XString();
        $this->disableScrim = new DataWrappers\Boolean();
        $this->loadingTitle = new DataWrappers\XString();
        $this->items = array();
        $this->events = new Events();
	}
    
    /**
     *  Adds an element to the content of Form.
     *  @param mixed $item An object that inherits from FormElement
     */
    public function add($item)
    {
        $this->addArray('items', $item, array('ButtonContainer', 'Collapsible', 'Checkbox', 'Email', 'HiddenField', 'Label', 'Password', 'Phone', 'RadioButtons', 'SelectMenu', 'TextInput', 'TextArea', 'Upload', 'Heading', 'HTML', 'Image', 'Table'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Form.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('items', $position);
    }
    
    /**
     *  Deletes an element from the content of Form.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('items', $position);
    }
    
    public function jsonSerialize()
    {        
        if ($this->relativePath->get() === null)
            throw new Exceptions\RequiredProperty('relativePath', __CLASS__);
        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'relativePath' => $this->relativePath,
            'requestMethod' => $this->requestMethod,
            'postType' => $this->postType,
            'heading' => $this->heading,
            'items' => $this->items,
            'disableScrim' => $this->disableScrim,
            'loadingTitle' => $this->loadingTitle,
        );
        
        if (!empty($this->events->eventName->get()))
            $format['events'] = $this->events;
        
        return $format;
    }
}

