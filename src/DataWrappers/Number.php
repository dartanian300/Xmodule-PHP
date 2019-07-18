<?php
require_once(__DIR__."/DataWrapperBase.php");

class Number extends DataWrapperBase {
    /** @var int The minimum this number can be. Should be set by subclasses */
	protected $min = null;
    /** @var int The maximum this number can be. Should be set by subclasses */
	protected $max = null;
    
	public function __construct() 
	{
		parent::__construct();
        
        $this->set(-1);
	}
    
    /**
     *  @param int|float $num
     *
     *  @throws OutOfRangeException if the provided argument is not within the ranges set by min and max
     */
	public function set($num){
        
        if ($this->min != null && $this->max != null){
            // enforce min & max
            if ($num > $this->min && $num < $this->max)
                $this->data = $num;
            else
                throw new OutOfRangeException("Parameter must be between $this->min and $this->max.");
        } else if ($this->min != null){
            // enforce min
            if ($num > $this->min)
                $this->data = $num;
            else
                throw new OutOfRangeException("Parameter must be larger than $this->min.");
        } else if ($this->max != null){
            // enforce max
            if ($num < $this->max)
                $this->data = $num;
            else
                throw new OutOfRangeException("Parameter must be smaller than $this->max.");
        } else {
            // no enforcement
            $this->data = $num;
        }
    }
}

