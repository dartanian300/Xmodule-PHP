<?php
/**
 *  @package Traits
 */
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/DataWrappers/Boolean.php");

class Events {
    /** @var XString */
	public $eventName;
    /** @var XString */
	public $targetId;
    /** @var XString */
	public $action;
    /** @var \Boolean */
	public $useRelativePathToUpdate;
    
	public function __construct() 
	{
//		parent::__construct();
        
        $this->eventName = new XString();
        $this->targetId = new XString();
        $this->action = new XString();
        $this->useRelativePathToUpdate = new Boolean();
	}
}

