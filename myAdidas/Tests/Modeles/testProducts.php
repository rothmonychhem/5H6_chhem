<?php

require_once 'Modele/Product
.php';

$tstProduct = new Product;
$products = $tstProduct->getProducts();
echo '<h3>Test getProducts : </h3>';
var_dump($Products->rowCount());

echo '<h3>Test getProduct : </h3>';
$product =  $tstProduct->getProduct(1);
var_dump($product);