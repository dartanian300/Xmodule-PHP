<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class Detail extends Element implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var Title */
	public $title;
    /** @var Title */
	public $subtitle;
    /** @var XString */
	public $body;
    /** @var Thumbnail */
	public $thumbnail;
    /** @var mixed[] */
    private $content;
    
	public function __construct($id = '')
	{
		parent::__construct('detail', $id);
        
        $this->title = new DataWrappers\Title();
        $this->subtitle = new DataWrappers\Title();
        $this->body = new DataWrappers\XString();
        $this->thumbnail = new Helpers\Thumbnail();
        $this->content = array();
	}
    
    /**
     *  Adds an element to the content of Detail.
     *  @param mixed $item An object to add
     */
    public function add($item)
    {
        $this->addArray('content', $item, array('ButtonContainer', 'Container', 'Form', 'Tabs', 'Heading', 'HTML', 'Image', 'XList', 'Table'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of Detail.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('content', $position);
    }
    
    /**
     *  Deletes an element from the content of Detail.
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
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'thumbnail' => $this->thumbnail,
            'content' => $this->content
        );
        
        return $format;
    }
}

