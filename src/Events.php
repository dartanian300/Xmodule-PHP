<?php
/**
 *  @package Traits
 */
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/DataWrappers/Boolean.php");

use XModule\DataWrappers as DataWrappers;
use XModule\Helpers as Helpers;

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
        
        $this->eventName = new DataWrappers\XString();
        $this->targetId = new DataWrappers\XString();
        $this->action = new DataWrappers\XString();
        $this->useRelativePathToUpdate = new DataWrappers\Boolean();
	}
}

