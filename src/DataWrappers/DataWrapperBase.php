<?php
class DataWrapperBase {
	protected $data;	// mixed
	public static function constructor__ () 
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	public function get () 
	{
		return NULL;
	}
}
?>
