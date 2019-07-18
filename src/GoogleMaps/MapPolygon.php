<?php
/**
 *  @package GoogleMaps
 *  
 */
require_once(__DIR__."/../Element.php");
require_once(__DIR__."/../DataWrappers/Color.php");
require_once(__DIR__."/../Link.php");
require_once(__DIR__."/../DataWrappers/LineWidth.php");
require_once(__DIR__."/../DataWrappers/Title.php");
require_once(__DIR__."/../DataWrappers/Description.php");
require_once(__DIR__."/../DataWrappers/Alpha.php");
require_once(__DIR__."/../Traits/ModifiableArray.php");

/**
 *  Summary.
 *  Description.
 *  @method void add(Point $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class MapPolygon extends Element implements JsonSerializable {
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
        $this->setModifiableProperties(array('polygon'));
        
        $this->title = new Title();
        $this->description = new Description();
        $this->link = new Link();
        $this->lineColor = new Color();
        $this->lineAlpha = new Alpha();
        $this->lineWidth = new LineWidth();
        $this->fillColor = new Color();
        $this->fillAlpha = new Alpha();
        $this->polygon = array();
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

