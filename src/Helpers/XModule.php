<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class XModule implements \JsonSerializable {
    /** @var XString */
	public $id;
    /** @var XString */
	public $relativePath;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->id = new DataWrappers\XString();
        $this->relativePath = new DataWrappers\XString();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'id' => $this->id,
            'relativePath' => $this->relativePath,
        );
        
        return $format;
    }
}

