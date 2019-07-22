<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/Traits/ModifiableArray.php");

/**
 *  Summary.
 *  Description.
 *  @method void add(mixed $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 *  @todo: recode ModifiableArray so that actual methods are in classes
 */
class ButtonContainer extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var mixed[] Can contain formButtons or linkButtons */
	private $buttons;
    
	public function __construct($id = '')
	{
		parent::__construct('buttonContainer', $id);
        $this->setModifiableProperties(array('buttons'));
        
        $this->buttons = array();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'buttons' => $this->buttons,
        );
        
        return $format;
    }
}

