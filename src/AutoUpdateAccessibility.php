<?php
/**
 *  @package Elements
 *  
 */

require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/TextAlignment.php");
require_once(__DIR__."/DataWrappers/DisclaimerType.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;

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
        
        $this->disclaimerType = new DataWrapper\DisclaimerType();
        $this->textAlignment = new DataWrapper\TextAlignment();
        $this->inset = new DataWrapper\Boolean();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'disclaimerType' => $this->disclaimerType,
            'textAlignment' => $this->textAlignment,
            'inset' => $this->inset
        );
        
        return $format;
    }
}

