<?php
require_once("model/Package/CarouselItem.php");
class Carousel extends Element {
	protected $items;	// array
	public static function constructor__String ($id) // [String id]
	{
		$me = new self();
		parent::constructor__();
		return $me;
	}
	abstract function add ($item); // [CarouselItem item]
	public function get ($position) // [int position]
	{
		return NULL;
	}
}
?>
