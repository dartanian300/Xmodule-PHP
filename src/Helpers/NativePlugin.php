<?php
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Number.php");
require_once(__DIR__."/QueryParameters.php");

class NativePlugin implements JsonSerializable {
    /** @var XString */
	public $id;
    /** @var QueryParameters */
	public $queryParameters;
    /** @var Number */
	public $version;
    /**
     *  @var Link
     *  @todo look into how to implement this fallbackLink
     */
	public $fallbackLink;
    
	public function __construct() 
	{
//		parent::__construct();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'id' => $this->id,
            'queryParameters' => $this->queryParameters,
            'version' => $this->version,
        );
        
        return $format;
    }
}

