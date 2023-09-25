<?php
$products = [
    ['MMS-1234', 'Trumpet', 199.95],
    ['MMS-8521', 'Flute', 149.95]
];
$file = fopen('products.csv', 'w') or die("could not open file for writing!");
foreach ($products as $product) { // write each array as a line
  fputcsv($file, $product); // default is comma separated
}

fclose($file);
echo "Wrote content to the csv file.";