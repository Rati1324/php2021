<?php 
abstract class Product 
{
	protected $SKU; 
	protected $name; 
	protected $price;
	protected $type;
	protected $db;
	function __construct($SKU, $name, $price, $type, $db)
	{
		$this->SKU = $SKU;
		$this->name = $name;
		$this->price = $price;
		$this->type = $type;
		$this->db = $db;
	}
	public function get_SKU()
	{ return $this->SKU; }
	public function set_SKU($SKU)
	{ return $this->SKU = $SKU; }
	public function get_name()
	{ return $this->name; }
	public function set_name($name)
	{ $this->name = $name; }
	public function get_price()
	{ return $this->price; }
	public function set_price($price)
	{ return $this->price; }

	public static function get_types($db)
	{
		$query = "SELECT name FROM type";
		return $db->select($query);
	}
}
class DVD extends product
{
	protected $size;
	function __construct($SKU, $name, $price, $type, $size, $db)
	{
		parent::__construct($SKU, $name, $price, $type, $db);
		$this->size = $size;
	}
	public function insert()
	{
		$query = "insert into product values(null, '$this->SKU', '$this->name', '$this->price', '$this->type', '$this->size',
				null, null, null, null)";
		$this->db->execute($query);
	}	
}
class Furniture extends product
{
	protected $height;
	protected $width;
	protected $length;
	function __construct($SKU, $name, $price, $type, $size, $height, $length, $width)	
	{
		parent::__construct($SKU, $name, $price, $db, $type);
		$this->height = $height;
		$this->width = $width;
		$this->length = $length;
	}
}
class Book extends product
{
	protected $weight;
	function __construct($SKU, $name, $price, $type, $size, $weight)
	{
		parent::__construct($SKU, $name, $price, $db, $type);
		$this->weight = $weight;
	}

}