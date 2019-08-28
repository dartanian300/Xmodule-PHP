<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

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
        
        $this->id = new DataWrappers\XString();
        $this->page = new DataWrappers\XString();
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

