<?php
class ContainerPadding extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function extraTight (); 
	abstract function tight (); 
	abstract function normal (); 
	abstract function loose (); 
	abstract function extraLoose (); 
}
?>
