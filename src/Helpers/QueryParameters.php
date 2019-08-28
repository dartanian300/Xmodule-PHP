<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

class QueryParameters implements \JsonSerializable {
    /** @var mixed[] An associative array */
	private $parameters;
    
	public  function __construct() 
	{
//		parent::__construct();
        $this->parameters = array();
	}
    
    /**
     *  @param string $key The key to remove from the array
     *  @param string $element The string to be the value
     */
	public function add($key, $element)
    {
        $this->parameters[$key] = new DataWrappers\XString($element);
    }
    
    /**
     *  @param string $key The key to remove from the array
     */
	public function delete($key){
        unset($this->parameters[$key]);
    }
    
    /**
     *  @param string $key The key to get from the array
     *  @return array|string Returns the entire array or a single value if the key is provided
     *  @throws OutOfBoundsException when fetching a key that does not exist
     */
	public function get($key = null)
	{
        if ($key === null){
            return $this->parameters;
        }
        else {
            if (!isset($this->parameters[$key]))
                throw new \OutOfBoundsException('key '.$key.' does not exist ');
            return $this->parameters[$key]->get();
        }
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'parameters' => $this->parameters,
        );
        
        return $format;
    }
}

