<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/DataWrappers/Boolean.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class LoadingIndicator extends Element implements \JsonSerializable {
    /** @var XString */
	public $label;
    /** @var \Boolean */
	public $hidden;
    
	public function __construct($id = '')
	{
		parent::__construct('loadingIndicator', $id);
        
        $this->label = new DataWrappers\XString();
        $this->hidden = new DataWrappers\Boolean();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'label' => $this->label,
            'hidden' => $this->hidden,
        );
        
        return $format;
    }
}

