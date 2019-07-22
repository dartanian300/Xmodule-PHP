<?php
namespace XModule\Helpers;

require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

use XModule\DataWrapper as DataWrapper;

/**
 *  Summary.
 *  Description.
 *  @method void add(Row $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class Row implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var Cell[] */
	private $cells;
    /** @var Link */
	public $link;
    
	public function __construct() 
	{
//		parent::__construct();
        $this->setModifiableProperties(array('cells'));
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'cells' => $this->cells,
            'link' => $this->link,
        );
        
        return $format;
    }
}

