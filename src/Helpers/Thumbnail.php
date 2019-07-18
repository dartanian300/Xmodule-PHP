<?php
require_once(__DIR__."/../DataWrappers/MaxHeight.php");
require_once(__DIR__."/../DataWrappers/MaxWidth.php");
require_once(__DIR__."/../DataWrappers/Alt.php");
require_once(__DIR__."/../DataWrappers/Boolean.php");
require_once(__DIR__."/../Image.php");

/**
 *  @todo resolve image conflict
 *  @todo ensure booleans are coming across as classes in documentation
 */

class Thumbnail implements JsonSerializable {
    /** @var Image */
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
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'url' => $this->url,
            'maxWidth' => $this->maxWidth,
            'maxHeight' => $this->maxHeight,
            'crop' => $this->crop,
            'alt' => $this->alt,
        );
        
        return $format;
    }
}

