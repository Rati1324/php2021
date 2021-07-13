<?php
include("db.php");
echo "asd";
$db = new Database;
if (isset($_POST['skus'])){
	$skus = json_decode($_POST['skus']);
	foreach ($skus as $s)
		$db->delete_product($s);
}