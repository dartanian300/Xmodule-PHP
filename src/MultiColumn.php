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
     */
	public function add($columnNum, $item)
    {
        if ($columnNum > $this->numColumns->get() - 1 || $columnNum < 0)
            throw new OutOfBoundsException('The parameter $columnNum must be less than or equal to the number of columns for this object');
        
        if (gettype($this->columns[$numColumns]) != "array")
            $this->columns[$numColumns - 1] = array();
        
        $this->columns[$numColumns - 1][] = $item;
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

