<?php
use XModule\DataWrappers as DataWrappers;
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
        
        $this->initialLatitude = new DataWrappers\Latitude();
        $this->initialLongitude = new DataWrappers\Longitude();
        $this->initialZoomLevel = new DataWrappers\ZoomLevel();
        $this->disableZoomToPlacemarks = new DataWrappers\Boolean();
        $this->defaultToUserLocated = new DataWrappers\Boolean();
        $this->minZoomLevel = new DataWrappers\ZoomLevel();
        $this->maxZoomLevel = new DataWrappers\ZoomLevel();
        $this->aspectRatio = new DataWrappers\AspectRatio();
        $this->inset = new DataWrappers\Boolean();
        $this->showUserLocationButton = new DataWrappers\Boolean();
        $this->showRecenterButton = new DataWrappers\Boolean();
        $this->showZoomButtons = new DataWrappers\Boolean();
        $this->baseLayers = new DataWrappers\BaseLayers();

        $this->dynamicPlacemarks = new GoogleMaps\DynamicPlacemarks();
        $this->staticPlacemarks = array();
	}
    
    /**
     *  Adds an element to the content of GoogleMap.
     *  @param mixed $item A MapPoint, MapPolyline or MapPolygon object to add
     */
    public function add($item)
    {
        $this->addArray('staticPlacemarks', $item, array('XModule\GoogleMaps\MapPoint', 'XModule\GoogleMaps\MapPolyline', 'XModule\GoogleMaps\MapPolygon'));
    }
    
    /**
     *  Returns an element (or all elements) from the content of GoogleMap.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function get($position = null)
    {
        return $this->getArray('staticPlacemarks', $position);
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

