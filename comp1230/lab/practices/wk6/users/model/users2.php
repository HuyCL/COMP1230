<?php
//$columns = ["id", "f_name", "l_name", "user_type"];

// get data from text file
function get_data($file="users2.txt"){
    $handle = fopen("model/" . $file, 'r') or die("Not able to read file");
    $data = [];
    $columns = explode(",", fgets($handle));
    if($handle){
        while($entries = fgetcsv($handle)) {
            $data[] = array_combine($columns,$entries);
        }
    }
    fclose($handle);
    return $data;
}
$users = get_data('users2.txt');