<?php
use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

class Table extends Element implements \JsonSerializable {
    use ModifiableArray; 
    
    /** @var XString */
	public $heading;
    /** @var ColumnOption[] */
	private $columnOptions;
    /** @var Row[] */
	private $rows;
    
	public function __construct($id = '')
	{
		parent::__construct('table', $id);
        
        $this->heading = new DataWrappers\XString();
        $this->columnOptions = array();
        $this->rows = array();
	}
    
    /**
     *  Adds an element to the content of Table.
     *  @param mixed $item A Row object to add
     */
    public function addRow($item)
    {
        $this->addArray('rows', $item, '\XModule\Helpers\Row');
    }
    
    /**
     *  Returns an element (or all elements) from the content of Table.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getRow($position = null)
    {
        return $this->getArray('rows', $position);
    }
    
    /**
     *  Deletes an element from the content of Table.
     *  @param int $position The element position to delete
     */
    public function deleteRow($position)
    {
        $this->deleteArray('rows', $position);
    }
    
    /**
     *  Adds an element to the content of Table.
     *  @param mixed $item A ColumnOption object to add
     */
    public function addColumnOption($item)
    {
        $this->addArray('columnOptions', $item, '\XModule\Helpers\ColumnOption');
    }
    
    /**
     *  Returns an element (or all elements) from the content of Table.
     *  @param int $position (optional) The element position to return.
     *  @return array|mixed If $position is provided, returns the element at that
     *    index in the array. If not, returns the entire array.
     */
    public function getColumnOption($position = null)
    {
        return $this->getArray('columnOptions', $position);
    }
    
    /**
     *  Deletes an element from the content of Table.
     *  @param int $position The element position to delete
     */
    public function deleteColumnOption($position)
    {
        $this->deleteArray('columnOptions', $position);
    }
    
    /**
     *  @return int Number of columns
     */
	public function getNumColumns() 
	{
        if (count($this->rows) == 0)
            return 0;
            
		return count($this->rows[0]->get());
	}
    
    public function jsonSerialize()
    {        
        $format = array(
            'elementType' => $this->elementType,
            'id' => $this->id,
            'heading' => $this->heading,
            'columnOptions' => $this->columnOptions,
            'rows' => $this->rows,
        );
        
        return $format;
    }
}

