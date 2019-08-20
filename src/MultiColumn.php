<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Number.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

/**
 *  The number of columns must be set to add content to them
 *  @todo see how to implement same func for 'add' as others
 */
class MultiColumn extends Element implements \JsonSerializable {
    /** @var mixed[] 2D array */
	private $columns;
    /** @var Number */
	private $numColumns;
    
    /**
     *  @param int $numColumns The number of columns this object will have
     */
	public function __construct($numColumns = 1, $id = '')
	{
		parent::__construct('multicolumn', $id);        
        
        $this->columns = array();
        $this->numColumns = new DataWrappers\Number();
        
        $this->setNumColumns($numColumns);
	}
    
    /**
     *  @param int $num
     */
	public function setNumColumns($num)
    {
        $this->numColumns->set($num);
    }
    
    /**
     *  @return int
     */
	public function getNumColumns()
    {
        return $this->numColumns->get();
    }
    
    /**
     *  @param int $columnNum The column to add the item to (0-indexed)
     *  @param mixed $item The object to add to that column
     *  @return int Index of array where $item was added
     */
	public function add($columnNum, $item)
    {
        if ($columnNum > $this->getNumColumns() - 1 || $columnNum < 0)
            throw new OutOfBoundsException('The parameter $columnNum must be less than or equal to the number of columns for this object');
        
        if (gettype($this->columns[$columnNum]) != "array")
            $this->columns[$columnNum] = array();
        
        $this->columns[$columnNum][] = $item;
        
        // move pointer to end of array to return correct key
        end($this->columns[$columnNum]);
//        var_dump($this->columns);
        return key($this->columns[$columnNum]);
    }
    
    /**
     *  @param int $columnNum The column to fetch the element from (0-indexed)
     *  @param int $elementIndex The index to fetch (0-indexed)
     *  @return mixed Element at $elementIndex
     */
	public function get($columnNum, $elementIndex)
    {
        if ($columnNum > $this->getNumColumns() - 1 || $columnNum < 0)
            throw new OutOfBoundsException('The parameter $columnNum must be less than or equal to the number of columns for this object AND above -1');
        if ($elementIndex > count($this->columns[$columnNum]) - 1 || $elementIndex < 0)
            throw new OutOfBoundsException('The parameter $elementIndex must be less than or equal to the number of elements in the array AND above -1. $elementIndex: '.$elementIndex.'  Array Length: '.count($this->columns[$columnNum]));
        
        return $this->columns[$columnNum][$elementIndex];
    }
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'columns' => $this->columns,
        );
        
        return $format;
    }
}

