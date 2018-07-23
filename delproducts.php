<?php
require_once('connect.php');
require_once('store.php');

$tablename = "products";

$store = new Store($conn, $tablename);
$selected = json_decode($_POST['selected']);

for ($i=0; $i < count($selected); $i++) {	
	$store->delProduct($selected[$i]);
}

$store->finish();