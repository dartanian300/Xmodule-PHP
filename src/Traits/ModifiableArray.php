<?php
/**
 *  @package Traits
 *  
 */
///**
//    Provides reusable add, get and delete methods for array properties.
//    Any class that implements ModifiableArray should call
//    setModifiablePropertyName in its constructor.
//*/
//trait ModifiableArray {
//    // the name of the array property to modify
//	private $modifiablePropertyName;	// String
//    
//	public function add($item)
//    {
//        $this->{$this->modifiablePropertyName}[] = $item;
//    }
//    
//    /**
//        Gets the entire modifiable array. If $position is provided, returns only that key's value.
//        @param int $position the array position of the value to return
//    */
//	public function get($position = null) // [int position]
//	{
////        var_dump($position);
//		if ($position == null){
////            echo "p = ''";
//            return $this->{$this->modifiablePropertyName};
//        }
//        else if (gettype($position) == "integer"){
////            echo "p = 'integer'";
//            return $this->{$this->modifiablePropertyName}[$position];
//        }
//	}
//    
//	public function delete($position)
//    {
//        array_splice($this->{$this->modifiablePropertyName}, $position, 1);
//    }
//    
//    private function setModifiablePropertyName($newName)
//    {
//        $this->modifiablePropertyName = $newName;
//    }
//}

/** @var ColumnOption[] */
//private $columnOptions;
///** @var Row[] */
//private $rows;
//
//$obj->addColumnOption();
//$obj->addRow();

/**
    Provides reusable add, get and delete methods for array properties.
    Any class that implements ModifiableArray should call
    setModifiablePropertyName in its constructor.
    
    @todo Update objects that use this trait to use the new setModifiableProperties()
    method and parameter format
*/
trait ModifiableArray {
    // the name of the array property to modify
//	private $modifiablePropertyNames;	// String
    /** @var string[] List of prefixes to generate methods */
    private $methodPrefixes;
    /**
     *  @var string[] An associative array of the available methods
     *   and their relationships with the properties they modify.
     *   Format:
     *    array(
     *      '*method*' => array('prefix' => '*prefixValue*', 'property' => '*propertyToModify*')
     *    );
     */
    private $availableMethods;
    /** @var boolean Internal flag for if this obj has been initialized */
    private $constructed = false;    
    
    public function __call($methodName, $arguments){
        if (!isset($this->availableMethods[$methodName]))
            throw new BadMethodCallException('The method '.$methodName.'() does not exist');
        
        $config = $this->availableMethods[$methodName];
                
        // add the parameter to change
        array_unshift($arguments, $config['property']);
        // call the appropriate method
        return call_user_func_array(array($this, $config['prefix']), $arguments);
    }
    
    /**
     *  Adds an element to the property array
     *  @var string $property The property to operate on
     *  @var mixed $item The element to add to the property array
     */
	private function add($property, $item)
    {
        $this->{$property}[] = $item;
    }
    
    /**
     *  Gets the entire modifiable array. If $position is provided, returns only that key's value.
     *  @param string $property The property to operate on
     *  @param int $position the array position of the value to return
     */
	private function get($property, $position = null) // [int position]
	{
//        var_dump($position);
		if ($position === null){
//            echo "p = ''";
            return $this->{$property};
        }
        else if (is_int($position)){
//            echo "p = 'integer'";
            return $this->{$property}[$position];
        }
	}
    
    /**
     *  Deletes a single element in the property array
     *  @param string $property The property to operate on
     *  @param int $position the array position of the value to return
     */
	private function delete($property, $position)
    {
        array_splice($this->{$property}, $position, 1);
    }
    
    /**
     *  Fake constructor to initialize arrays
     */
    private function construct(){
        if ($this->constructed == true)
            return;
        
        $this->methodPrefixes = array('add', 'get', 'delete');
        $this->availableMethods = array();
        
        $this->constructed = true;
    }
    
    /**
     *  @param string[] $properties An array of properties to create methods for.
     *   If the property name is different from the method suffix, then specify
     *   by adding an associative array element with the key being the property name
     *   and the value being the method suffix.
     *   Example: array('content', 'metadata', 'regionContent', 'rows' => 'row', 'columnOptions' => 'columnOption');
     */
    private function setModifiableProperties($properties)
    {
        $this->construct();
        
        if (count($properties) == 1 && is_int(key($properties))){
            // only 1 property provided (and it doesn't specify a different property and method suffix)
            // use generic 'add', 'get' and 'delete' methods in addition to the standard ones
            $this->generateAvailableMethods($properties[0], null, true);
        }
        
        foreach($properties as $key => $value){
            if (is_int($key)){
                // only property name provided (format: 'methodSuffix')
                $this->generateAvailableMethods($value);
            } else {
                // both property and method suffix provided (format: 'property' => 'methodSuffix')
                $this->generateAvailableMethods($value, $key);
            }
        }
    }
    
    /**
     *  Creates a list of available methods to be called via __call()
     *  @param string $methodSuffix The part of the method name that is appended after the prefixed.
     *  For example, a method suffix of 'test' would render methods 'addTest', 'getTest' and 'deleteTest'.
     *
     *  @param string $property (optional) The name of the property that will be modified with the generated
     *  methods. If not provided, the $methodSuffix will be used.
     *
     *  @param boolean $generic Whether to create generic 'add', 'get' and 'delete' methods instead of specific ones
     */
    private function generateAvailableMethods($methodSuffix, $property = null, $generic = false){
        if ($property == null)
            $property = $methodSuffix;
        
        // Generate map for method/property relationship
        foreach($this->methodPrefixes as $prefix){
            $method = ( $generic == true ? $prefix : $prefix.ucfirst($methodSuffix) );
            $this->availableMethods[$method] = array('prefix' => $prefix, 'property' => $property);
        }
    }
}

