<?php
// declare(strict_types=1);
require 'model/users.php';
require 'model/issues.php';

$page = '';

if(!empty($_GET)){ 
    // if user requested to filter records by...
    if(isset($_GET['student']) || isset($_GET['faculty']) || isset($_GET['active']) || isset($_GET['inactive'])){
        $page = 'users';
        $input_array;

        // Filters all inputs from the form
        foreach($_GET as $key => $val){
            $val = filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING);
            $input_array[$key] = $val;
        }

        // Get length of the array and change array to numeric order
        $length = count($input_array);
        $input_array = array_values($input_array);

        echo $length;
        if (in_array('faculty', $input_array) && in_array('student', $input_array) && $length == 4) {
            if(in_array('active', $input_array)) {
                $users = filter_records($users, 'status', 'active');
            }
            else if(in_array('inactive', $input_array)) {
                $users = filter_records($users, 'status', 'inactive');
            }
        }
        else if(in_array('active', $input_array) && in_array('inactive', $input_array) && $length == 4) {
            if(in_array('student', $input_array)) {
                $users = filter_records($users, 'user_type', 'student');
            }
            else if(in_array('faculty', $input_array)) {
                $users = filter_records($users, 'user_type', 'faculty');
            }
        }
        else if($length == 3) {
            $users = filter_records($users, 'user_type', $input_array[1]);
            $users = filter_records($users, 'status', $input_array[2]);
        }
        else if($length == 2) {
            if($input_array[1] == 'student' || $input_array[1] == 'faculty') {
                $users = filter_records($users, 'user_type', $input_array[1]);
            }
            else {
                $users = filter_records($users, 'status', $input_array[1]);
            }
        }
    }
    else if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
        // $page = $_GET['page'];
    }
}


if($page){
    switch($page){
        case 'home':
            include 'view/home.phtml'; 
            break; 
        case 'users':
            include 'view/users.phtml';
            break;
        case 'issues':
            include 'view/issues.phtml'; 
            break; 
        default:
            include 'view/error.phtml'; 
    }
}
else{
    include 'view/home.phtml';
}


// echo "<hr>";
// show_source(__FILE__); 