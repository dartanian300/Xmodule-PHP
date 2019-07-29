<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");

use XModule\DataWrappers as DataWrappers;

class XModule implements \JsonSerializable {
    /** @var XString */
	public $relativePath;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->relativePath = new DataWrappers\XString();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'relativePath' => $this->relativePath,
        );
        
        return $format;
    }
}

