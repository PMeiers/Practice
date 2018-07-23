<?php
require_once('connect.php');
require_once('store.php');

$tablename = "products";
$store = new Store($conn, $tablename);
$store->getProducts();
$store->finish();

