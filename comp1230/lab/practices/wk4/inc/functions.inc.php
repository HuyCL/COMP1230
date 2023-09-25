<?php
function filtered_records($filter_key, $val){
    global $users;
    $users = array_filter($users, function($record) use ($filter_key, $val){
        return $record[$filter_key] == $val;
    });
    $users = array_values($users);
}
// filtered_records('status', 'active');
function get_caategories($array, $col){
    $categories = array_column($array, $col);
    return array_unique($categories);
}
$statuses = get_caategories($users, "status");
$user_types = get_caategories($users, "user_type");