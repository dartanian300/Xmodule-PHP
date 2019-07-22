<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Size.php");

use XModule\DataWrapper as DataWrapper;

class Badge implements \JsonSerializable {
    /** @var XString */
	public $value;
    /** @var XString */
	public $descriptor;
    /** @var Size */
	public $size;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->value = new DataWrapper\XString();
        $this->descriptor = new DataWrapper\XString();
        $this->size = new DataWrapper\Size();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'value' => $this->value,
            'descriptor' => $this->descriptor,
            'size' => $this->size,
        );
        
        return $format;
    }
}

