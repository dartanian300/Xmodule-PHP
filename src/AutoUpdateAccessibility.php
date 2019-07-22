<?php
/**
 *  @package Elements
 *  
 */

require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/TextAlignment.php");
require_once(__DIR__."/DataWrappers/DisclaimerType.php");

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
        
        $this->disclaimerType = new disclaimerType();
        $this->textAlignment = new textAlignment();
        $this->inset = new Boolean();
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

