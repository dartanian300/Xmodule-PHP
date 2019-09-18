<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class HTML extends Element implements \JsonSerializable {
    /** @var XString */
	public $html;
    /** @var \Boolean */
	public $focal;
    /** @var \Boolean */
	public $inset;
    
    // todo: accept html in constructor
	public function __construct($html = '', $id = '')
	{
		parent::__construct('html', $id);
        
        $this->html = new DataWrappers\XString($html);
        $this->focal = new DataWrappers\Boolean();
        $this->inset = new DataWrappers\Boolean();
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

