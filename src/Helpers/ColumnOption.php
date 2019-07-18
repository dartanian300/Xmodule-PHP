<?php
require_once(__DIR__."/../DataWrappers/VerticalAlignment.php");
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/StringWidth.php");
require_once(__DIR__."/../DataWrappers/HorizontalAlignment.php");

class ColumnOption implements JsonSerializable {
    /** @var XString */
	public $header;
    /** @var StringWidth */
	public $width;
    /** @var VerticalAlignment */
	public $verticalAlign;
    /** @var HorizontalAlignment */
	public $horizontalAlign;
    
	public function __construct() 
	{
//		parent::__construct();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'header' => $this->header,
            'width' => $this->width,
            'verticalAlign' => $this->verticalAlign,
            'horizontalAlign' => $this->horizontalAlign,
        );
        
        return $format;
    }
}

