<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/Title.php");
require_once(__DIR__."/DataWrappers/Description.php");
require_once(__DIR__."/Exceptions/RequiredProperty.php");

use XModule\DataWrappers as DataWrapper;
use XModule\Helpers as Helpers;

class Heading extends Element implements \JsonSerializable {
    /** @var Title */
	public $title;
    /** @var Description */
	public $description;
    /** @var \Boolean */
	public $inset;
    
	public function __construct($id = '')
	{
		parent::__construct('heading', $id);
        
        $this->title = new DataWrapper\Title();
        $this->description = new DataWrapper\Description();
        $this->inset = new DataWrapper\Boolean();
	}
    
    public function jsonSerialize()
    {        
        if ($this->title->get() === null)
            throw new Exceptions\RequiredProperty('title', __CLASS__);
        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'inset' => $this->inset,
        );
        
        return $format;
    }
}

