<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/DataWrappers/Boolean.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;

class HTML extends Element implements \JsonSerializable {
    /** @var XString */
	public $html;
    /** @var \Boolean */
	public $focal;
    /** @var \Boolean */
	public $inset;
    
	public function __construct($id = '')
	{
		parent::__construct('html', $id);
        
        $this->html = new DataWrapper\XString();
        $this->focal = new DataWrapper\Boolean();
        $this->inset = new DataWrapper\Boolean();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'html' => $this->html,
            'focal' => $this->focal,
            'inset' => $this->inset,
        );
        
        return $format;
    }
}

