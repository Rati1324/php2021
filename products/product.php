<?php 
abstract class Product 
{
	protected $SKU; 
	protected $name; 
	protected $price;
	function __construct($SKU, $name, $price)
	{
		$this->SKU = $SKU;
		$this->name = $name;
		$this->price = $price;
	}
	public function get_sku()
	{ return $this->SKU; }
	public function set_sku($sku)
	{ $this->sku = $sku; }
	public function get_name()
	{ return $this->name; }
	public function set_name($name)
	{ $this->name = $name; }
	public function get_price()
	{ return $this->price; }
	public function set_price($price)
	{ return $this->price; }

	public function insert() 
	{
			
	}
	public function delete()
	{
	}
}
class DVD extends product
{
	protected $size;
	function __construct($SKU="", $name="", $price="", $size="")
	{
		parent::__construct($SKU, $name, $price);
		$this->size = $size;
	}
	
}
class Furniture extends product
{
	protected $height;
	protected $width;
	protected $length;
	function __construct($SKU="", $name="", $price="", $size="", $height="", $length="", $width="")	
	{
		parent::__construct($SKU, $name, $price);
		$this->height = $height;
		$this->width = $width;
		$this->length = $length;
	}
}
class Book extends product
{
	protected $weight;
	function __construct($SKU="", $name="", $price="", $weight="")
	{
		parent::__construct($SKU, $name, $price);
		$this->weight = $weight;
	}

}