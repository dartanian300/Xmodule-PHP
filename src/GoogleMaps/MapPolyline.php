<?php
namespace XModule\GoogleMaps;

/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/Color.php");
require_once(__DIR__."/../DataWrappers/LineWidth.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../DataWrappers/Description.php");
require_once(__DIR__."/../DataWrappers/Alpha.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

use XModule\DataWrappers as DataWrappers;

class MapPolyline extends \Element implements \JsonSerializable {
    use \ModifiableArray; 
    
    /** @var Title */
	public $title;
    /** @var Description */
	public $description;
    /** @var Link */
	public $link;
    /** @var Color */
	public $lineColor;
    /** @var Alpha */
	public $lineAlpha;
    /** @var LineWidth */
	public $lineWidth;
    /** @var Point[] */
    private $polyline;
    
	public function __construct($id = '') 
	{
		parent::__construct('mapPolyline', $id);
        
        $this->title = new DataWrappers\Title();
        $this->description = new DataWrappers\Description();
        $this->link = new \Link();
        $this->lineColor = new DataWrappers\Color();
        $this->lineAlpha = new DataWrappers\Alpha();
        $this->lineWidth = new DataWrappers\LineWidth();
        $this->polyline = array();
	}
    
    /**
     *  Adds an element to the content of MapPolyline.
     *  @param mixed $item A Point object to add
     */
    public function add($item)
    {
        $this->addArray('polyline', $item, 'Point');
    }
    
    /**
     *  Returns an element (or all elements) from the content of MapPolyline.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('polyline', $position);
    }
    
    /**
     *  Deletes an element from the content of MapPolyline.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('polyline', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'polyline' => $this->polyline,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'lineColor' => $this->lineColor,
            'lineAlpha' => $this->lineAlpha,
            'lineWidth' => $this->lineWidth,
        );
        
        return $format;
    }
}

