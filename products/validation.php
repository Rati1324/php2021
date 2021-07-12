<?php
$messages = [];
function valid_sku($sku){
	if (strlen($sku) == 0 || strlen($sku) > 8)
		return "Enter a 8 character SKU";
	return "";
}
function valid_name($name){
	if (empty($sku)) return "This field can't be empty";
	return "";
}
function valid_number($num){
	$msg = "";
	if (!is_numeric($num)) $msg = "Enter a valid number";
	else if ((float)$num < 0) $msg = "Enter a positive number";
	return $msg;
}
$messages['sku'] = valid_sku($_POST['SKU']);
$messages['name'] = valid_name($_POST['name']);
$messages['price'] = valid_number($_POST['price']);
