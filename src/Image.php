<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Alt.php");
require_once(__DIR__."/DataWrappers/URL.php");
require_once(__DIR__."/DataWrappers/Boolean.php");

class Image extends Element implements \JsonSerializable {
    /** @var URL */
	public $url;
    /** @var Alt */
	public $alt;
    /** @var \Boolean */
	public $scaleToFull;
    /** @var \Boolean */
	public $enableZoomControls;
    
	public function __construct($id = '')
	{
		parent::__construct('image', $id);
        
        $this->url = new URL();
        $this->alt = new Alt();
        $this->scaleToFull = new Boolean();
        $this->enableZoomControls = new Boolean();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'url' => $this->url,
            'alt' => $this->alt,
            'scaleToFull' => $this->scaleToFull,
            'enableZoomControls' => $this->enableZoomControls,
        );
        
        return $format;
    }
}

