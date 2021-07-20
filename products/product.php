<?php 
abstract class Product 
{
	protected $id;
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
	public function get_id(){
		return $this->id;
	}
	public function get_SKU(){ 
		return $this->SKU; 
	}
	public function set_SKU($SKU){
		if (strlen($SKU) == 9)
			$this->SKU = $SKU; 
	}
	public function get_name(){
		return $this->name; 
	}
	public function set_name($name){
		if (!empty($string))
			$this->name = $name;
	}
	public function get_price(){
		return $this->price; 
	}
	public function set_price($price){ 
		if ($price > 0) $this->price = $price; 
	}
	public static function get_all($db)
	{
		$products = [];
		$query = "SELECT * FROM product";
		$res = $db->select($query);
		foreach($res as $p){
			$class_name = Product::get_type($p['type_id'], $db);
			$p = array_values($p);
			$p = array_filter($p);
			$products[] = new $class_name(...$p, ...[$db]);
		}
		return $products;
	}
	public static function get_type($type_id, $db)
	{
		$query = "SELECT name FROM type WHERE id = '$type_id'";
		return $db->select($query, 'name')[0];
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
	public function get_size(){
		return $this->size;
	}
	public function set_size($size){
		if (is_numeric($size) && $size > 0) $this->size = $size;
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
	function __construct($SKU, $name, $price, $type, $height, $length, $width, $db)	
	{
		parent::__construct($SKU, $name, $price, $type, $db);
		$this->height = $height;
		$this->width = $width;
		$this->length = $length;
	}
	public function get_height(){
		return $this->height;
	}
	public function set_height($height){
		if (is_numeric($height) && $height > 0) 
			$this->height = $height;
	}
	public function get_width(){
		return $this->width;
	}
	public function set_width($width){
		if (is_numeric($width) && $width > 0) 
			$this->width = $width;
	}
	public function get_length(){
		return $this->length;
	}
	public function set_length($length){
		if (is_numeric($length) && $length > 0) 
			$this->length = $length;
	}
}
class Book extends product
{
	protected $weight;
	function __construct($SKU, $name, $price, $type, $weight, $db)
	{
		parent::__construct($SKU, $name, $price, $type, $db);
		$this->weight = $weight;
	}
	public function get_weight(){
		return $this->weight;
	}
	public function set_weight($weight){
		if (is_numeric($weight) && $weight > 0) 
			$this->weight = $weight;
	}
}