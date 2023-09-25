<?php
$row = 1;
if (($handle = fopen("products-tab.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br></p>\n";
        $row++;
        foreach ($data as $field) {
            echo "<div>item: $field </div>\n";
        }
    }
    fclose($handle);
}
