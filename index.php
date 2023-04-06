<?php

require(__DIR__ . '/Product.php');

$productModel = new Product();
$productModel->create([
    'name' => "sanpham1",
    'decription' => 'decription 1',
    'price' => 200
]);

// echo "<pre>";
// print_r($productModel);