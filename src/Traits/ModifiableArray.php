<?php
/**
 *  @internal
 *  @todo Let addArray take array as for expected types
 *  @todo make $expectedType take array
 */
trait ModifiableArray {
    /**
     *  Adds an element to the property array.
     *  @param string $property The property to operate on. Can be a string or array of strings
     *  @param mixed|mixed[] $items The element to add to the property array. Can be a string or array of strings.
     *  @param string|string[] $expectedType The native type (integer, string, etc) or object name that all $items should be.
     *    
     */
	private function addArray($property, $items, $expectedType = null)
    {
        // make array
        if (!is_array($items))
            $items = array($items);
        
        // make array
        if ($expectedType !== null && !is_array($expectedType))
            $expectedType = array($expectedType);
        
        foreach($items as $item){
            // enforce type
            if ($expectedType !== null && is_array($expectedType)){
                if (!$this->isValidType($item, $expectedType)){
                    $type = gettype($item) == 'object' ? get_class($item) : gettype($item);
                    throw new InvalidArgumentException('$item should be of type '.implode(', ', $expectedType).'. '.$type.' was provided ');
                }
            }
            
            $this->{$property}[] = $item;
        }
    }
    
    /**
     *  Checks if a given argument matches one of the given types
     *  @param string $item The item for which to check
     *  @param string[] $expectedType The types for which $item is valid
     *  @return bool
     */
    private function isValidType($item, $expectedType){
        $realType = gettype($item);
                
        if ($realType == 'object'){
            foreach($expectedType as $t){
                if (is_a($item, $t))
                    return true;
            }
        } else {
            foreach($expectedType as $t){
                if ($realType == $t)
                    return true;
            }
        }
        
        return false;
    }
    
    /**
     *  Gets the entire modifiable array. If $position is provided, returns only that key's value.
     *  @param string $property The property to operate on
     *  @param int $position the array position of the value to return
     */
	private function getArray($property, $position = null)
	{
		if ($position === null){
            return $this->{$property};
        }
        else if (is_int($position)){
            return $this->{$property}[$position];
        }
	}
    
    /**
     *  Deletes a single element in the property array.
     *  @param string $property The property to operate on
     *  @param int $position the array position of the value to return
     */
	private function deleteArray($property, $position)
    {
        array_splice($this->{$property}, $position, 1);
    }
}

