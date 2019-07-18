<?php
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

/**
 *  Summary.
 *  Description.
 *  @method void add(Point $item)
 *  @method mixed get(integer $position = null)
 *  @method void delete(integer $position)
 *
 *  @todo: figure out why these methods aren't parsing
 */
class MapPolyline extends Element implements JsonSerializable {
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
    /** @var Point[] */
    private $polyline;
    
	public function __construct($id = '') 
	{
		parent::__construct('mapPolyline', $id);
        $this->setModifiableProperties(array('polyline'));
        
        $this->title = new Title();
        $this->description = new Description();
        $this->link = new Link();
        $this->lineColor = new Color();
        $this->lineAlpha = new Alpha();
        $this->lineWidth = new LineWidth();
        $this->polyline = array();
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

