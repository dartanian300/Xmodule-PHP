<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class Authority implements \JsonSerializable {
    /** @var XString */
	public $type;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->type = new DataWrappers\XString();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'type' => $this->type,
        );
        
        return $format;
    }
}

