<?php
namespace XModule\Helpers;

class Shortcut implements \JsonSerializable {
    /** @var Shortcut */
    public $type;
    
	public function __construct() 
	{
//		parent::__construct();
        $this->title = new \XModule\DataWrappers\Shortcut();
	}
    
	public function jsonSerialize()
    {        
        $format = array(
            'type' => $this->type,
        );
        
        return $format;
    }
    
}

