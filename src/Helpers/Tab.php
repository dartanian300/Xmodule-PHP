<?php
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

/**
    @todo does this need to check type???? Modifiable array add
*/
/**
 *  Summary.
 *  Description.
 *  @method void add(mixed $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class Tab implements JsonSerializable {
    use ModifiableArray;
    
    /** @var Title */
	public $title;
    /** @var mixed[] */
	private $content;
    
	public  function __construct() 
	{
		parent::__construct();
        $this->setModifiableProperties(array('content'));
        $this->content = array();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'title' => $this->title,
            'content' => $this->content,
        );
        
        return $format;
    }
}

