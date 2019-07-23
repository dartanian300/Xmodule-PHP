<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/Traits/ModifiableArray.php");
require_once(__DIR__."/DataWrappers/ZoomLevel.php");
require_once(__DIR__."/DataWrappers/AspectRatio.php");
require_once(__DIR__."/DataWrappers/Boolean.php");
require_once(__DIR__."/DataWrappers/Longitude.php");
require_once(__DIR__."/DataWrappers/Latitude.php");
require_once(__DIR__."/DataWrappers/BaseLayers.php");
require_once(__DIR__."/GoogleMaps/DynamicPlacemarks.php");

use XModule\DataWrapper as DataWrapper;
use XModule\Helpers as Helpers;
use XModule\GoogleMaps as GoogleMaps;

class GoogleMap extends Element implements \JsonSerializable {
    use ModifiableArray;
    
    /** @var Latitude */
	public $initialLatitude;
    /** @var Longitude */
	public $initialLongitude;
    /** @var ZoomLevel */
	public $initialZoomLevel;
    /** @var \Boolean */
	public $disableZoomToPlacemarks;
    /** @var \Boolean */
	public $defaultToUserLocated;
    /** @var ZoomLevel */
	public $minZoomLevel;
    /** @var ZoomLevel */
	public $maxZoomLevel;
    /** @var AspectRatio */
	public $aspectRatio;
    /** @var \Boolean */
	public $inset;
    /** @var \Boolean */
	public $showUserLocationButton;
    /** @var \Boolean */
	public $showRecenterButton;
    /** @var \Boolean */
	public $showZoomButtons;
    /** @var BaseLayers */
	public $baseLayers;
    /** @var mixed[] Can be MapPoint, MapPolyline or MapPolygon */
	private $staticPlacemarks;
    /** @var DynamicPlacemarks */
	private $dynamicPlacemarks;
    
	public function __construct($id = '')
	{
		parent::__construct('googleMap', $id);
        
        $this->initialLatitude = new DataWrapper\Latitude();
        $this->initialLongitude = new DataWrapper\Longitude();
        $this->initialZoomLevel = new DataWrapper\ZoomLevel();
        $this->disableZoomToPlacemarks = new DataWrapper\Boolean();
        $this->defaultToUserLocated = new DataWrapper\Boolean();
        $this->minZoomLevel = new DataWrapper\ZoomLevel();
        $this->maxZoomLevel = new DataWrapper\ZoomLevel();
        $this->aspectRatio = new DataWrapper\AspectRatio();
        $this->inset = new DataWrapper\Boolean();
        $this->showUserLocationButton = new DataWrapper\Boolean();
        $this->showRecenterButton = new DataWrapper\Boolean();
        $this->showZoomButtons = new DataWrapper\Boolean();
        $this->baseLayers = new DataWrapper\BaseLayers();

        $this->dynamicPlacemarks = new GoogleMaps\DynamicPlacemarks();
        $this->staticPlacemarks = array();
	}
    
    /**
     *  Adds an element to the content of GoogleMap.
     *  @param mixed $item A MapPoint, MapPolyline or MapPolygon object to add
     */
    public function add($item)
    {
        $this->addArray('staticPlacemarks', $item);
    }
    
    /**
     *  Returns an element (or all elements) from the content of GoogleMap.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        $this->getArray('staticPlacemarks', $position);
    }
    
    /**
     *  Deletes an element from the content of GoogleMap.
     *  @param int $position The element position to delete
     */
    public function delete($position)
    {
        $this->deleteArray('staticPlacemarks', $position);
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'initialLatitude' => $this->initialLatitude,
            'initialLongitude' => $this->initialLongitude,
            'initialZoomLevel' => $this->initialZoomLevel,
            'disableZoomToPlacemarks' => $this->disableZoomToPlacemarks,
            'defaultToUserLocated' => $this->defaultToUserLocated,
            'minZoomLevel' => $this->minZoomLevel,
            'maxZoomLevel' => $this->maxZoomLevel,
            'aspectRatio' => $this->aspectRatio,
            'inset' => $this->inset,
            'showUserLocationButton' => $this->showUserLocationButton,
            'showRecenterButton' => $this->showRecenterButton,
            'showZoomButtons' => $this->showZoomButtons,
            'baseLayers' => $this->baseLayers,
            'staticPlacemarks' => $this->staticPlacemarks,
            'dynamicPlacemarks' => $this->dynamicPlacemarks,
        );
        
        return $format;
    }
}

