<?php
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/URL.php");

class NativeApp implements JsonSerializable {
    /** @var URL */
	public $nativeAppURL;
    /** @var XString */
	public $fallbackLink;
    
	public  function __construct() 
	{
		parent::__construct();
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

