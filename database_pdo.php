<?php
    $db_info = 'mysql:host=127.0.0.1;dbname=f1069146_test';
    $username = 'f1069146';
    $password = 'Carvinlam1998';

    try {
        $db_con = new PDO($db_info, $username, $password);
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        echo "PDO Database not connected. Error: " . $error_message . "<br";
        exit();
    }
?>