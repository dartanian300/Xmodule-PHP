<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class NativePlugin implements \JsonSerializable {
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
        
        $this->id = new DataWrappers\XString();
        $this->queryParameters = new QueryParameters();
        $this->version = new DataWrappers\Number();
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

