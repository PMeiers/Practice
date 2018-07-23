<?php
require_once('connect.php');
require_once('store.php');

$tablename = "products";
$product  = json_decode($_POST['product']);

$store = new Store($conn, $tablename);
$store->addProduct($product);
$store->finish();

