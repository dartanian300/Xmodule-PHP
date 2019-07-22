<?php
namespace XModule\DataWrapper;

require_once(__DIR__."/XString.php");
require_once(__DIR__."../Helpers/Badge.php");

class Image extends XString {
    /**
     *  @var Badge Used in GridItem
     *  @see Badge
     */
	public $badge;
    
	public function __construct() 
	{
		parent::__construct();
        $this->badge = new Badge();
	}
}

