<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;
use XModule\Exceptions as Exceptions;

class RadioButtons extends FormElement implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var string[] */
	private $optionLabels;
    /** @var string[] */
	private $optionValues;
    /** @var ProgressiveDisclosureItems */
	public $progressiveDisclosureItems;
    
	public function __construct() 
	{
		parent::__construct('radio');
        
        $this->optionLabels = array();
        $this->optionValues = array();
        $this->progressiveDisclosureItems = new Helpers\ProgressiveDisclosureItems();
	}
    
    
    /**
     *  Adds an element to the content of SelectMenu.
     *  @param string $item A string to add
     */
    public function addOptionLabel($item)
    {
        $this->addArray('optionLabels', $item, 'string');
    }
    
    /**
     *  Returns an element (or all elements) from the content of SelectMenu.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getOptionLabel($position = null)
    {
        return $this->getArray('optionLabels', $position);
    }
    
    /**
     *  Deletes an element from the content of SelectMenu.
     *  @param int $position The element position to delete
     */
    public function deleteOptionLabel($position)
    {
        $this->deleteArray('optionLabels', $position);
    }
    
    /**
     *  Adds an element to the content of SelectMenu.
     *  @param string $item A string to add
     */
    public function addOptionValue($item)
    {
        $this->addArray('optionValues', $item, 'string');
    }
    
    /**
     *  Returns an element (or all elements) from the content of SelectMenu.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getOptionValue($position = null)
    {
        return $this->getArray('optionValues', $position);
    }
    
    /**
     *  Deletes an element from the content of SelectMenu.
     *  @param int $position The element position to delete
     */
    public function deleteOptionValue($position)
    {
        $this->deleteArray('optionValues', $position);
    }
    
    public function jsonSerialize()
    {        
        if ($this->name->get() === null)
            throw new Exceptions\RequiredProperty('name', __CLASS__);
        if ($this->label->get() === null)
            throw new Exceptions\RequiredProperty('label', __CLASS__);
        
        $format = array(
            'elementType' => $this->elementType,
            'inputType' => $this->inputType,
            'name' => $this->name,
            'label' => $this->label,
            'description' => $this->description,
            'value' => $this->value,
            'required' => $this->required,
            
            'optionLabels' => $this->optionLabels,
            'optionValues' => $this->optionValues,
            'progressiveDisclosureItems' => $this->progressiveDisclosureItems,
        );
        
        return $format;
    }
}

