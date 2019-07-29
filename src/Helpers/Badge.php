<?php
namespace XModule\Helpers;

require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Size.php");
require_once(__DIR__."/../Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Exceptions as Exceptions;

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
        
        $this->value = new DataWrappers\XString();
        $this->descriptor = new DataWrappers\XString();
        $this->size = new DataWrappers\Size();
	}
    
    public function jsonSerialize()
    {
        if ($this->value->get() === null)
            throw new Exceptions\RequiredProperty('value', __CLASS__);
        if ($this->descriptor->get() === null)
            throw new Exceptions\RequiredProperty('descriptor', __CLASS__);
        
        $format = array(
            'value' => $this->value,
            'descriptor' => $this->descriptor,
            'size' => $this->size,
        );
        
        return $format;
    }
}

