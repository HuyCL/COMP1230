<?php

// Convert array to correct URL parameter format
function array_to_url_string($item) {
    $url_str = "id=" . $item[0] . "&";
    $url_str .= "item=" . $item[1] . "&";
    $url_str .= "type=" . $item[2] . "&";
    $url_str .= "brand=" . $item[3] . "&";
    $url_str .= "model=" . $item[4] . "&";
    $url_str .= "size=" . $item[5] . "&";
    $url_str .= "price=" . $item[6] . "&";
    $url_str .= "sale=" . $item[7] . "&";
    $url_str .= "description=" . str_replace(' ', '&nbsp;', $item[8]);;
    return $url_str;
}

// Get the number of records in a file
function get_line_count() {
    $line_count = 0;
    $handle = fopen('tvs.csv', 'r') or die("Not able to read file");;
    while(!feof($handle)) {
        $line = fgets($handle);
        $line_count++;
    }
    fclose($handle);
    return $line_count;
}

// Read file and store all records in an array
function read_file() {
    $handle = fopen('tvs.csv', 'r') or die("Not able to read file");
    $items = array();
    if($handle) {
        while($entries = fgetcsv($handle)) {
            $items[] = $entries;
        }
    }
    fclose($handle);
    return $items;
}

// Append record to file with the values passed in the parameter
function add_record_to_file($type, $brand, $model, $size, $o_price, $s_price, $description) {
    $unique_id = get_line_count();
    // Generate random 5-digit
    $item_number = rand(10000,99999);
    $handle = fopen('tvs.csv', 'a') or die("Not able to read file");;
    fwrite($handle, "\n" . $unique_id . ',' . $item_number . ',' . $type . ',' . $brand . ',' . $model . ',' . $size . ',' . $o_price . ',' . $s_price . ',' . $description);
    fclose($handle);
}

// Search for record with matching ID, re-write record with new values 
function update_record($id, $item_no, $type, $brand, $model, $size, $o_price, $s_price, $description) {
    $items = read_file();
    $counter = 0;
    $handle = fopen('tvs.csv', 'w') or die("Not able to read file");
    foreach($items as $item) {
        // If ID found, write to file with data passed in the function parameter
        if($counter == $id) {
            fputcsv($handle, array($id, $item_no, $type, $brand, $model, $size, $o_price, $s_price, $description));
        }
        else {
            fputcsv($handle, $item);
        }
        $counter++;
    }
    fclose($handle);
    return $items;
}

// Search for record with specified ID in the parameter
// Re-write file with same data except for the record that matches
function delete_record($id) {
    $items = read_file();
    $handle = fopen('tvs.csv', 'w') or die("Not able to read file");
    
    // Delete requested record & re-index array
    unset($items[$id]);
    $items = array_values($items);
    // Update unique IDs ensuring it is properly incremented
    $counter = 0;
    foreach($items as $item) {
        $item[0] = $counter;
        fputcsv($handle, $item);
        $counter++;
    }
    fclose($handle);
}

// Search for record with specified item number in the parameter
// Return array containing record information OR return null
function search_record($item_no) {
    $items = read_file();

    foreach($items as $item) {
        if($item[1] == $item_no) {
            return $item;
        }
    }
    return null;
}