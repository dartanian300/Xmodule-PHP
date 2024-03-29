<?php
namespace XModule\GoogleMaps;

use XModule\DataWrappers as DataWrappers;

class MapPolygon extends \Element implements \JsonSerializable {
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
    /** @var Color */
	public $fillColor;
    /** @var Alpha */
	public $fillAlpha;
    /** @var Point[] */
    private $polygon;
    
	public function __construct($id = '') 
	{
		parent::__construct('mapPolygon', $id);
        
        $this->title = new DataWrappers\Title();
        $this->description = new DataWrappers\Description();
        $this->link = new \Link();
        $this->lineColor = new DataWrappers\Color();
        $this->lineAlpha = new DataWrappers\Alpha();
        $this->lineWidth = new DataWrappers\LineWidth();
        $this->fillColor = new DataWrappers\Color();
        $this->fillAlpha = new DataWrappers\Alpha();
        $this->polygon = array();
	}
    
    /**
     *  Adds an element to the content of MapPolygon.
     *  @param mixed $item A Point object to add
     */
    public function add($item)
    {
        $this->addArray('polygon', $item, '\XModule\GoogleMaps\Point');
    }
    
    /**
     *  Returns an element (or all elements) from the content of MapPolygon.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('polygon', $position);
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

