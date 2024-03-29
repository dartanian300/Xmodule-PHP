<?php

class XModuleResponse implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var string[] Associative array of metadata properties */
	private $metadata;
    /** @var mixed[] Elements that should be included in the Xmodule response */
	private $content;
    /** @var mixed[] Same as $content, but for AJAX content */
	private $regionContent;
    
    /**
     *
     */
	public function __construct() 
	{        
		$this->metadata = array();
        $this->content = array();
        $this->regionContent = array();
        
        $this->initializeMetadata();
	}
    
    /**
     *  Adds an element to the content of XModuleResponse.
     *  @param mixed $item An object that inherits from Element
     */
    public function add($item)
    {
        $this->addArray('content', $item, 'Element');
    }
    
    /**
     *  Returns an element (or all elements) from the content of XModuleResponse.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('content', $position);
    }
    
    /**
     *  Deletes an element from the content of XModuleResponse.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('content', $position);
    }
    
    /**
     *  Creates JSON response for xmodule
     *  @return string JSON representation of object
     */
	public function json() 
	{
        return json_encode($this);
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'metadata' => $this->metadata,
            'content' => $this->content
        );
        
        return $format;
    }
    
    /**
     *  Sets default metadata 
     *  @internal
     */
    private function initializeMetadata()
    {
        $defaultMeta = array(
            "version" => "1"
        );
        $this->metadata = array_merge($this->metadata, $defaultMeta);
    }
}

