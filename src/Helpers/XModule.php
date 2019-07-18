<?php
require_once(__DIR__."/../DataWrappers/XString.php");

class XModule implements JsonSerializable {
    /** @var XString */
	public $relativePath;
    
	public function __construct() 
	{
//		parent::__construct();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'relativePath' => $this->relativePath,
        );
        
        return $format;
    }
}

