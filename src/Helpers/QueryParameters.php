<?php
namespace XModule\Helpers;

use XModule\DataWrappers as DataWrappers;

//todo Make add() accept arrays

class QueryParameters implements \JsonSerializable {
    /** @var mixed[] An associative array */
	private $parameters;
    
	public  function __construct() 
	{
//		parent::__construct();
        $this->parameters = array();
	}
    
    /**
     *  This method supports 2 different signatures:
     *  add($key, $element)
     *  @param string $key The key to remove from the array
     *  @param string $element The string to be the value
     *
     *  add($arr)
     *  @param string[] $arr Associative array of key/value pairs
     */
	public function add($key, $element = '')
    {
        if (is_array($key)){
            foreach($key as $k=>$v){
                $this->add($k, $v);
            }
        } else {
            $this->parameters[$key] = new DataWrappers\XString($element);
        }
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
        $format = $this->parameters;
        
        return $format;
    }
}

