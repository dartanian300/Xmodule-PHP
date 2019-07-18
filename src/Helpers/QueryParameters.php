<?php
require_once(__DIR__."/../DataWrappers/XString.php");

/**
 *  @todo probably need toJSON method
 */

class QueryParameters implements JsonSerializable {
    /** @var mixed[] An associative array */
	private $parameters;
    
	public  function __construct() 
	{
		parent::__construct();
        $this->parameters = array();
	}
    
    /**
     *  @param string $key The key to remove from the array
     *  @param string $element The string to be the value
     */
	public function add($key, $element)
    {
        $this->$parameters[$key] = new XString($element);
    }
    
    /**
     *  @param string $key The key to remove from the array
     */
	public function delete($key){
        unset($this->$parameters[$key]);
    }
    
    /**
     *  @param string $key The key to get from the array
     *  @return array|string Returns the entire array or a single value if the key is provided
     */
	public function get($key = null)
	{
        if ($key === null)
            return $this->$parameters;
        else
            return $this->$parameters[$key];
	}
    
    /**
        TODO: implement this
    */
    public function jsonSerialize()
    {        
        $format = array(
            'parameters' => $this->parameters,
        );
        
        return $format;
    }
}

