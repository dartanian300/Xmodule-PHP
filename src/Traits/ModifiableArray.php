<?php
/**
 *  @internal
 *  @todo Let addArray take array as for expected types
 *  @todo make $expectedType take array
 */
trait ModifiableArray {
    /**
     *  Adds an element to the property array.
     *  @param string $property The property to operate on
     *  @param mixed $item The element to add to the property array
     *  @param string $expectedType The native type (integer, string, etc) or object name that all $items should be
     */
	private function addArray($property, $item, $expectedType = null)
    {
        // enforce type
        if ($expectedType !== null){
            $realType = gettype($item);
            if ($realType == 'object'){
                if (!is_a($item, $expectedType))
                    throw new InvalidArgumentException('$item should be of type '.$expectedType.'. '.$realType.' was provided ');
            } else {
                if (!$realType == $expectedType)
                    throw new InvalidArgumentException('$item should be of type '.$expectedType.'. '.$realType.' was provided ');
            }
        }
        $this->{$property}[] = $item;
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

