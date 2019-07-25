<?php
/**
 *  @package Traits
 */
require_once(__DIR__."/DataWrappers/XString.php");
require_once(__DIR__."/DataWrappers/Boolean.php");

use XModule\DataWrappers as DataWrapper;
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
        
        $this->eventName = new DataWrapper\XString();
        $this->targetId = new DataWrapper\XString();
        $this->action = new DataWrapper\XString();
        $this->useRelativePathToUpdate = new DataWrapper\Boolean();
	}
}

