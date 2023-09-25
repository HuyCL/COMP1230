<?php
require 'users.inc.php';

function filter_records($data, $filter_key, $val){
    //i.e  $filter_by = "student";
   $data = array_filter($data, function($record) use ($filter_key, $val){
       return $record[$filter_key] == $val;
   });
   return array_values($data); // re-index the array
}
function get_categories($array, $col){
   $categories = array_column($array, $col); // returns values of a column from a 2D array as an array
   return array_unique($categories);
}

$clients = get_categories($users, "client");
$statuses = get_categories($users, "status");
$user_types = get_categories($users, "user_type");
$checkbox_array = array_merge($user_types, $statuses);