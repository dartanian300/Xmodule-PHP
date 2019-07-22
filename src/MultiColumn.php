<?php
/**
 *  @package Elements
 *  
 */
require_once(__DIR__."/Element.php");
require_once(__DIR__."/DataWrappers/Number.php");

/**
 *  The number of columns must be set to add content to them
 *  
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
        
        $this->setNumColumns($numColumns);
        
        $this->columns = array();
        $this->numColumns = new Number();
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
     *  @param int $columnNum The column to add the item to
     *  @param mixed $item The object to add to that column
     */
	public function add($columnNum, $item)
    {
        if ($columnNum > $this->numColumns->get())
            throw new OutOfBoundsException('The parameter $columnNum must be less than or equal to the number of columns for this object');
        
        if (gettype($this->columns[$numColumns]) != "array")
            $this->columns[$numColumns] = array();
        
        $this->columns[$numColumns][] = $item;
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

