<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Alt.php");
require_once(__DIR__."/DataWrappers/URL.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrapper;
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
        
        $this->url = new DataWrapper\URL();
        $this->alt = new DataWrapper\Alt();
        $this->scaleToFull = new DataWrapper\Boolean();
        $this->enableZoomControls = new DataWrapper\Boolean();
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

