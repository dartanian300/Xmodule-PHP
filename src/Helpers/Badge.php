<?php
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Size.php");

class Badge implements JsonSerializable {
    /** @var XString */
	public $value;
    /** @var XString */
	public $descriptor;
    /** @var Size */
	public $size;
    
	public function __construct() 
	{
		parent::__construct();
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

