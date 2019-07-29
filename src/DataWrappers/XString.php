<?php
namespace XModule\DataWrappers;

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
        $this->setFormat($format);
        $this->set($value);
	}
    
    /**
     *  @param string $str
     */
	public function set($str)
    {
        if ($this->format !== null && !$this->validateFormat($str))
            throw new \InvalidArgumentException('$str should be in the format '.$this->format.' ');
            
        $this->data = $str;
    }
    
    /**
     *  Sets the format this string must adhear to. Must be set prior to 
     *  calling set() in order to be acknowledged 
     *  @param string $format A valid PHP regex string
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }
    
    /**
     *  Checks whether this string matches its intended format.
     *  The format must either be provided on instantiation (in which case it
     *  is stored) or via the validateFormat parameter (in which case it
     *  is only used for the single call).
     *
     *  @param string $string The string to check the format against
     *  @param string $format A regex for which the string needs to adhear
     *  @return boolean
     */
	protected function validateFormat($string, $format = null){
        $f = $format == null ? $this->format : $format;
        
        return preg_match($f, $string);
    }
}

