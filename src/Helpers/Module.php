<?php
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/QueryParameters.php");

class Module implements JsonSerializable {
    /** @var XString */
	public $id;
    /** @var XString */
	public $page;
    /** @var QueryParameters */
	public $queryParameters;
    
	public function __construct() 
	{
		parent::__construct();
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

