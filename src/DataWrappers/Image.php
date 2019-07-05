<?php
require_once("model/Package/Badge.php");
class Image extends String {
	public $badge;	// Badge
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
}
?>
