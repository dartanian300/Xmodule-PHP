<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

/**
 *  @todo I think each key can have multiple elements...might need to rewrite this to allow that
 */

class ProgressiveDisclosureItems implements \JsonSerializable {
    /** @var mixed[] An associative array */
	private $items;
    
	public function __construct() 
	{
//		parent::__construct();
        $this->items = array();
	}
    
    /**
     *  This method supports 2 different signatures:
     *  add($key, $element)
     *  @param string $key The key to add to the array
     *  @param mixed $element The object for which to add
     *
     *  add($arr)
     *  @param string[] $arr Associative array of key/value pairs
     */
	public function add($key, $element = null)
    {
        if (is_array($key)){
            foreach($key as $k=>$v){
                $this->add($k, $v);
            }
        } else {
            if ($element === null)
                throw new \InvalidArgumentException('$element is a required argument.');
            
            $this->items[$key] = $element;
        }
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

