<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class NativeApp implements \JsonSerializable {
    /** @var URL */
	public $nativeAppURL;
    /** @var XString */
	public $fallbackLink;
    
	public  function __construct() 
	{
//		parent::__construct();
        
        $this->nativeAppURL = new DataWrappers\URL();
        $this->fallbackLink = new DataWrappers\XString();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'nativeAppURL' => $this->nativeAppURL,
            'fallbackLink' => $this->fallbackLink,
        );
        
        return $format;
    }
}

