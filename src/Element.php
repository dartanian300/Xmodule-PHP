<?php
abstract class Element {
	protected $elementType;	// String
	protected $id;	// String
	public static function constructor__String ($elementType) // [String elementType]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function toJSON (); 
	public function getElementType () 
	{
		return "";
	}
	abstract function setElementType (); 
	public function getId () 
	{
		return "";
	}
	abstract function setId (); 
}
?>
