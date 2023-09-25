<?php
session_start();

echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

$message = 'Redirected from first page';

$_SESSION["message"] = $message;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Session</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
    <a href="main.php">You may visit main page now</a>

</body>
</html>

<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>