<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Number.php");
require_once(__DIR__."/QueryParameters.php");

use XModule\DataWrappers as DataWrapper;

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
        
        $this->id = new DataWrapper\XString();
        $this->queryParameters = new QueryParameters();
        $this->version = new DataWrapper\Number();
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

