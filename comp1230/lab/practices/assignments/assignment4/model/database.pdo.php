<?php
    // Connects to the database with information below
    session_start();
    $db_info = 'mysql:host=127.0.0.1;dbname=f1069146_Assignment4';
    $username = 'f1069146';
    $password = 'Carvinlam1998';

    // Try catch block to give error if no success connecting to db
    try{
        $db_conn=new PDO($db_info,$username,$password);
    }catch(PDOException $e){
        $error_message = $e->getMessage();
        echo "PDO database not connection error". $error_message;
        exit();
    }
?>