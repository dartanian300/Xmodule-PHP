<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/URL.php");

use XModule\DataWrappers as DataWrapper;

class NativeApp implements \JsonSerializable {
    /** @var URL */
	public $nativeAppURL;
    /** @var XString */
	public $fallbackLink;
    
	public  function __construct() 
	{
//		parent::__construct();
        
        $this->nativeAppURL = new DataWrapper\URL();
        $this->fallbackLink = new DataWrapper\XString();
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

