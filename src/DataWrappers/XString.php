<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/DataWrapperBase.php");

class XString extends DataWrapperBase {
    /** @var string A regex for which the string needs to adhear */
	protected $format;
    
    /**
     *  @param string $format A regex for which the string needs to adhear
     */
	public function __construct($value = '', $format = null) 
	{
        parent::__construct();
        $this->format = $format;
        $this->set($value);
	}
    
    /**
     *  @param string $str
     */
	public function set($str)
    {
        $this->data = $str;
    }
    
    /**
     *  Checks whether this string matches its intended format.
     *  The format must either be provided on instantiation (in which case it
     *  is stored) or via the validateFormat parameter (in which case it
     *  is only used for the single call).
     *
     *  @param string $format A regex for which the string needs to adhear
     *  @return boolean
     */
	protected function validateFormat($format = null){
        $f = $format == null ? $this->format : $format;
        
        return preg_match($f, $this->get());
    }
}

