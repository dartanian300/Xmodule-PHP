<?php
class BrowserType extends DataWrapperBase {
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function appModal (); 
	abstract function appScreen (); 
	abstract function systemBrowserEmbedded (); 
	abstract function systemBrowserExternal (); 
	abstract function operation (); 
}
?>
