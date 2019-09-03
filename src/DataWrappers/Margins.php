<?php
namespace XModule\DataWrappers;

class Margins extends DataWrapperBase implements \JsonSerializable {
	public function __construct() 
	{
		parent::__construct();
	}
    
	public function none()
    {
        $this->data = 'none';
    }
    
	public function responsive()
    {
        $this->data = 'responsive';
    }
    
	public function minimal()
    {
        $this->data = 'minimal';
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'value' => $this->get()
        );
        
        return $format;
    }
}

