                                                                <!-- DELETE PAGE - Temporary Page To Refresh Main Page With Updated Data -->

<?php 
    require 'inc/functions.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Delete Item</title>
    <meta name="description" content="Notify user that the delete operation is successful">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php 
        delete_record($_GET['id']);
    ?>
    <script>
        alert("Record has been successfully deleted!");
        location.href="main.php";
    </script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>