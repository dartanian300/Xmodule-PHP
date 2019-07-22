<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/FormElement.php");
require_once(__DIR__."/../Helpers/ProgressiveDisclosureItems.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;

/**
 *  Summary.
 *  Description.
 *  @method void addOptionLabel(string $item)
 *  @method mixed getOptionLabel(integer $position = null)
 *  @method void deleteOptionLabel(integer $position)
 *
 *  @method void addOptionValue(string $item)
 *  @method mixed getOptionValue(integer $position = null)
 *  @method void deleteOptionValue(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
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
        $this->setModifiableProperties(array('optionLabels' => 'optionLabel', 'optionValues' => 'optionValue'));
        
        $this->optionLabels = array();
        $this->optionValues = array();
        $this->progressiveDisclosureItems = new Helpers\ProgressiveDisclosureItems();
	}
    
    public function jsonSerialize()
    {        
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

