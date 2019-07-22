<?php
namespace XModule\DataWrapper;

abstract class DataWrapperBase implements \JsonSerializable {
    /** @var mixed */
	protected $data;
    
	public function __construct() 
	{
//		parent::__construct();
	}
    
    /**
     *  @return mixed
     */
	public function get() 
	{
		return $this->data;
	}
    
    public function jsonSerialize()
    {        
        $format = $this->data;
        
        return $format;
    }
}

