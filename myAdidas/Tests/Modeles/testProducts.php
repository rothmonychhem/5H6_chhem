<?php

require_once 'Modele/Product
.php';

$tstProduct = new Product;
$products = $tstProduct->getAllProducts();
echo '<h3>Test getProducts : </h3>';
var_dump($Products->rowCount());

echo '<h3>Test getProduct : </h3>';
$product =  $tstProduct->getProductById(1);
var_dump($product);