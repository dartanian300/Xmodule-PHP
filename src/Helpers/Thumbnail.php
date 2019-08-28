<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

class Thumbnail implements \JsonSerializable {
    /** @var URL */
	public $url;
    /** @var MaxWidth */
	public $maxWidth;
    /** @var MaxHeight */
	public $maxHeight;
    /** @var \Boolean */
	public $crop;
    /** @var Alt */
	public $alt;
    /**
     *  @var Badge Used in ListItem
     *  @see ListItem
     */
	public $badge;
    
	public  function __construct() 
	{
//		parent::__construct();
        
        $this->url = new DataWrappers\URL();
        $this->maxWidth = new DataWrappers\MaxWidth();
        $this->maxHeight = new DataWrappers\MaxHeight();
        $this->crop = new DataWrappers\Boolean();
        $this->alt = new DataWrappers\Alt();
        $this->badge = new Badge();
	}
    
    public function jsonSerialize()
    {        
        if ($this->url->get() === null)
            throw new Exceptions\RequiredProperty('url', __CLASS__);
        
        $format = array(
            'url' => $this->url,
            'maxWidth' => $this->maxWidth,
            'maxHeight' => $this->maxHeight,
            'crop' => $this->crop,
            'alt' => $this->alt,
            'badge' => $this->badge
        );
        
        return $format;
    }
}

