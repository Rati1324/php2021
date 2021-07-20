<?php
include("validation.php");
if ($valid){	
    include("product.php");
    unset($_POST['submit']);
    $_POST = array_filter($_POST);
    $types = Product::get_types($db);
    $class_name = $types[$_POST['type'] - 1];

    $product = new $class_name(...$_POST, ...[$db]);
    $product->insert();
    // header("location: index.php");
}