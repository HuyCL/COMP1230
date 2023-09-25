<?php
if (file_exists("file1.txt")) {
    // include 'file1.txt';
    // readfile("file1.txt");
    $myData = file_get_contents("file1.txt");
    // echo $myData;
    echo nl2br($myData);
}
else{
    echo "file does not exist";
}