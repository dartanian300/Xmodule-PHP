<?php
class AccessoryIcon extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function drilldown (); 
	abstract function phone (); 
	abstract function sms (); 
	abstract function comment (); 
	abstract function email (); 
	abstract function email_open (); 
	abstract function reply (); 
	abstract function calendar (); 
	abstract function people (); 
	abstract function map (); 
	abstract function secure (); 
	abstract function unlock (); 
	abstract function external (); 
	abstract function attachment (); 
	abstract function download (); 
	abstract function upload (); 
	abstract function camera (); 
	abstract function print (); 
	abstract function favorite (); 
	abstract function bookmark (); 
	abstract function share (); 
	abstract function rotate (); 
	abstract function plus (); 
	abstract function minus (); 
	abstract function button_add (); 
	abstract function button_remove (); 
	abstract function flag (); 
	abstract function delete (); 
	abstract function reset (); 
	abstract function reload (); 
	abstract function like (); 
	abstract function unlike (); 
	abstract function checkbox (); 
	abstract function checkbox_on (); 
	abstract function previous (); 
	abstract function next (); 
	abstract function none (); 
}
?>
