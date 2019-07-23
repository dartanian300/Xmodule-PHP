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

use XModule\DataWrapper as DataWrapper;

class MapPolygon extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
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
    /** @var Color */
	public $fillColor;
    /** @var Alpha */
	public $fillAlpha;
    /** @var Point[] */
    private $polygon;
    
	public function __construct($id = '') 
	{
		parent::__construct('mapPolygon', $id);
        
        $this->title = new DataWrapper\Title();
        $this->description = new DataWrapper\Description();
        $this->link = new Link();
        $this->lineColor = new DataWrapper\Color();
        $this->lineAlpha = new DataWrapper\Alpha();
        $this->lineWidth = new DataWrapper\LineWidth();
        $this->fillColor = new DataWrapper\Color();
        $this->fillAlpha = new DataWrapper\Alpha();
        $this->polygon = array();
	}
    
    /**
     *  Adds an element to the content of MapPolygon.
     *  @param mixed $item A Point object to add
     */
    public function add($item)
    {
        $this->addArray('polygon', $item, 'Point');
    }
    
    /**
     *  Returns an element (or all elements) from the content of MapPolygon.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        $this->getArray('polygon', $position);
    }
    
    /**
     *  Deletes an element from the content of MapPolygon.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('polygon', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'polygon' => $this->polygon,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'lineColor' => $this->lineColor,
            'lineAlpha' => $this->lineAlpha,
            'lineWidth' => $this->lineWidth,
            'fillColor' => $this->fillColor,
            'fillAlpha' => $this->fillAlpha,
        );
        
        return $format;
    }
}

