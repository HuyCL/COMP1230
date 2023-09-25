<?php
$file = fopen('products.csv', 'r') or die("File could not open!");
$products = [];

while (!feof($file)) {
    $product = fgetcsv($file);
    if ($product === false) continue;
    $products[] = $product;
    echo "<div>$product[0] | $product[1] | $product[2]</div>";
}

