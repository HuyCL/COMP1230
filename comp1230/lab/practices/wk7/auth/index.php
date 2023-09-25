<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
?>

<h1>Welcome <?= $_SESSION['username']?> 
<a href="logout.php">Logout</a></h1>
<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>