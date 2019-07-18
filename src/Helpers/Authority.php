<?php
require_once(__DIR__."/../DataWrappers/XString.php");

class Authority implements JsonSerializable {
    /** @var XString */
	public $type;
    
	public function __construct() 
	{
		parent::__construct();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'type' => $this->type,
        );
        
        return $format;
    }
}

