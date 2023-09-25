<?php
session_start();
if(!isset($_SESSION['message'])){
    header("Location:first.php");
}
?>

<h3>Welcome to main page!. Data stored in session in previous page
    can be retrieve on other pages, until they are destroyed!
    message from previous page is: "<?= $_SESSION['message']?>"</h3>

<?php 
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<hr>";
show_source(__FILE__); 