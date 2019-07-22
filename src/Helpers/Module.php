<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/QueryParameters.php");

use XModule\DataWrapper as DataWrapper;

class Module implements \JsonSerializable {
    /** @var XString */
	public $id;
    /** @var XString */
	public $page;
    /** @var QueryParameters */
	public $queryParameters;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->id = new DataWrapper\XString();
        $this->page = new DataWrapper\XString();
        $this->queryParameters = new QueryParameters();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'id' => $this->id,
            'page' => $this->page,
            'queryParameters' => $this->queryParameters,
        );
        
        return $format;
    }
}

