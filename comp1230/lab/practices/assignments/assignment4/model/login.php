<?php
require 'functions.inc.phtml';
include('database.pdo.php');

session_start();

$emp_data = get_employee_data($db_conn);

$employeeId = (isset($_COOKIE['employeeId'])) ? $_COOKIE['employeeId'] : '';
if(isset($_POST['employeeId']) && isset($_POST['password'])) {
    // 1. sanitize data
    $employeeId = filter_input(INPUT_POST, 'employeeId', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    // 2. check if is a valid user
    foreach($emp_data as $emp) {
        if($emp['employeeId'] === $employeeId && $emp['e_password'] === $password && $emp['status1'] === 'Active'){ 
            // 3. and if employee id and password match, add employeeId to session
                $_SESSION["employeeId"] = $employeeId;
                setcookie('employeeId', $employeeId, time() + (60 * 60 * 24 * 365), "/");
        }

    } 
}
if(isset($_SESSION["employeeId"])) {
    header("Location:../index.php");
} else {
    header("Location:../view/login.phtml");
}

?>