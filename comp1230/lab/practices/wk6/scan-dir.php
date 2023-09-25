<?php
$path = getcwd();
// $items = scandir($path);
// to exclude hidden files/directory, list them in following array
$items = array_diff(scandir($path),[".",".."]);
$file = fopen('directories.txt', 'wb') or die("could not open file for writing");
foreach ($items as $item) {
     $item_path = $path . DIRECTORY_SEPARATOR . $item;
     if (is_dir($item_path)) {
         fwrite($file, $item . "\n");
     }
}
// readfile("directories.txt") or die("could not read file");
$list = file("directories.txt"); // read content of the file. Stores each line as array element
// print_r($list);
$data = implode("<br>", $list);
echo $data;

fclose($file);
