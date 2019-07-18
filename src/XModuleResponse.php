<?php
require_once(__DIR__."/Traits/ModifiableArray.php");

/**
 *  Summary.
 *  Description.
 *  @method void add(mixed $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class XModuleResponse implements JsonSerializable {
    use ModifiableArray; 
    
    /** @var string[] Associative array of metadata properties */
	private $metadata;
    /** @var mixed[] Elements that should be included in the Xmodule response */
	private $content;
    /** @var mixed[] Same as $content, but for AJAX content */
	private $regionContent;
    
	public function __construct() 
	{
        $this->setModifiableProperties(array('content'));
        
		$this->metadata = array();
        $this->content = array();
        $this->regionContent = array();
        
        $this->initializeMetadata();
	}
        
    /**
     *  Creates JSON response for xmodule
     *  @return string JSON representation of object
     */
	public function print() 
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

