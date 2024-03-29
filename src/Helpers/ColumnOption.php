<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class ColumnOption implements \JsonSerializable {
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
        
        $this->header = new DataWrappers\XString();
        $this->width = new DataWrappers\StringWidth();
        $this->verticalAlign = new DataWrappers\VerticalAlignment();
        $this->horizontalAlign = new DataWrappers\HorizontalAlignment();
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

