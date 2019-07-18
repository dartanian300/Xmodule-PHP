<?php

/**
 *  @todo might need toJSON method
 *  @todo I think each key can have multiple elements...might need to rewrite this to allow that
 *  TODO: Use ModifiableArray?
 */

class ProgressiveDisclosureItems implements JsonSerializable {
    /** @var mixed[] An associative array */
	private $items;
    
	public function __construct() 
	{
		parent::__construct();
        $this->items = array();
	}
    
    /**
     *  @param string $key The key to remove from the array
     *  @param mixed $element The object for which to add
     */
	public function add($key, $element)
    {
        $this->items[$key] = $element;
    }
    
    /**
     *  @param string $key The key to remove from the array
     */
	public function delete($key){
        unset($this->items[$key]);
    }
    
    /**
     *  @param string $key The key to get from the array
     *  @return array|string Returns the entire array or a single value if the key is provided
     */
	public function get($key = null)
	{
        if ($key === null)
            return $this->items;
        else
            return $this->items[$key];
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'items' => $this->items,
        );
        
        return $format;
    }
}

