<?php
namespace XModule\DataWrappers;

use XModule\Exceptions as Exceptions;

class Image extends XString implements \JsonSerializable {
    /**
     *  @var Badge Used in GridItem
     *  @see Badge
     */
	public $badge;
    
	public function __construct() 
	{
		parent::__construct();
        $this->badge = new \XModule\Helpers\Badge();
	}
    
    public function jsonSerialize()
    {
        if ($this->get() === null)
            throw new Exceptions\RequiredProperty('url', __CLASS__);
        
        $format = array(
            'url' => $this->data,
            'badge' => $this->badge
        );
        
        return $format;
    }
}

