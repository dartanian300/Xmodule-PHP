<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");

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

