<?php
/**
 *  @package Elements
 *  
 */

abstract class Element {
    /** @var string */
	protected $elementType;
    /** @var string */
	protected $id;
    
    /**
     *  @param string $elementType
     *  @param string $id
     */
	public function __construct($elementType, $id = '')
	{
		$this->setId($id);
        $this->setElementType($elementType);
	}
    
    /**
     *  @return string
     */
	public function getElementType() 
	{
		return $this->elementType;
	}
    
    /**
     *  @return string
     */
	public function getId() 
	{
		return $this->id;
	}
    
    /**
     *  @return string
     */
    private function setElementType($elType)
    {
        $this->elementType = $elType;
    }
    
    /**
     *  @param string
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
//    abstract function toJSON(); 
	
}
