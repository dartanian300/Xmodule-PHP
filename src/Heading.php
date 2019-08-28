<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;
use XModule\Exceptions as Exceptions;

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
        
        $this->title = new DataWrappers\Title();
        $this->description = new DataWrappers\Description();
        $this->inset = new DataWrappers\Boolean();
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

