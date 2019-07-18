<?php
/**
 *  @package Forms
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../DataWrappers/PostType.php");
require_once(__DIR__."/../DataWrappers/XString.php");
require_once(__DIR__."/../DataWrappers/Boolean.php");
require_once(__DIR__."/../DataWrappers/RequestMethod.php");
require_once(__DIR__."/../Events.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

/**
 *  Summary.
 *  Description.
 *  @method void add(mixed $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class Form extends Element implements JsonSerializable {
    use Events, ModifiableArray;
    
    /** @var XString */
	public $relativePath;
    /** @var RequestMethod */
	public $requestMethod;
    /** @var PostType */
	public $postType;
    /** @var XString */
	public $heading;
    /** @var \Boolean */
	public $disableScrim;
    /** @var XString */
	public $loadingTitle;
    /** @var mixed[] */
    private $items;
    
	public function __construct($id = '')
	{
		parent::__construct('form', $id);
        $this->setModifiableProperties(array('items'));
        
        $this->relativePath = new XString();
        $this->requestMethod = new RequestMethod();
        $this->postType = new PostType();
        $this->heading = new XString();
        $this->disableScrim = new Boolean();
        $this->loadingTitle = new XString();
        $this->items = array();
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'relativePath' => $this->relativePath,
            'requestMethod' => $this->requestMethod,
            'postType' => $this->postType,
            'heading' => $this->heading,
            'items' => $this->items,
            'disableScrim' => $this->disableScrim,
            'loadingTitle' => $this->loadingTitle,
        );
        
        return $format;
    }
}

