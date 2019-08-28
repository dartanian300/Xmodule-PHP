<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;
use XModule\Exceptions as Exceptions;

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
        
        $this->url = new DataWrappers\URL();
        $this->alt = new DataWrappers\Alt();
        $this->scaleToFull = new DataWrappers\Boolean();
        $this->enableZoomControls = new DataWrappers\Boolean();
	}
    
    public function jsonSerialize()
    {        
        if ($this->url->get() === null)
            throw new Exceptions\RequiredProperty('url', __CLASS__);
        
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

