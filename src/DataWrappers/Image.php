<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/XString.php");
require_once(__DIR__."../Helpers/Badge.php");

class Image extends XString implements \JsonSerializable {
    /**
     *  @var Badge Used in GridItem
     *  @see Badge
     */
	public $badge;
    
	public function __construct() 
	{
		parent::__construct();
        $this->badge = new Badge();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'url' => $this->data,
            'badge' => $this->badge
        );
        
        return $format;
    }
}

