<?php
/**
 *  @package Elements
 *  
 */

require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/TextAlignment.php");
require_once(__DIR__."/DataWrappers/DisclaimerType.php");
require_once(__DIR__."/Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;
use XModule\Exceptions as Exceptions;

class AutoUpdateAccessibility extends Element implements \JsonSerializable {
    /** @var DisclaimerType */
	public $disclaimerType;
    /** @var TextAlignment */
	public $textAlignment;
    /** @var \Boolean */
	public $inset;
    
	public function __construct($id = '')
	{
		parent::__construct('autoUpdateAccessibility', $id);
        
        $this->disclaimerType = new DataWrappers\DisclaimerType();
        $this->textAlignment = new DataWrappers\TextAlignment();
        $this->inset = new DataWrappers\Boolean();
	}
    
    public function jsonSerialize()
    {        
        if ($this->disclaimerType->get() === null)
            throw new Exceptions\RequiredProperty('disclaimerType', __CLASS__);
            
        $format = array(
            'elementType' => $this->elementType,
            'disclaimerType' => $this->disclaimerType,
            'textAlignment' => $this->textAlignment,
            'inset' => $this->inset
        );
        
        return $format;
    }
}

