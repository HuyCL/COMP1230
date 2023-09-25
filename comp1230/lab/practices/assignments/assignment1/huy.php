<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Second Page</title>
    <meta name="description" content="COMP1230 - Retrieve data from parameters and display on webpage">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
    // Extract, filter, and sanitize data passed from first page
    $first_name = filter_input(INPUT_GET, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_GET, 'last_name', FILTER_SANITIZE_STRING);
    $student_id = filter_input(INPUT_GET, 'student_id', FILTER_SANITIZE_STRING);
    $background = filter_input(INPUT_GET, 'color', FILTER_SANITIZE_STRING);
?>
<body <?php echo "style=\"background-color:$background\""?>>
    <?php
        echo "<h2>First Name: $first_name</h2>
              <h2>Last Name: $last_name</h2>
              <h2>Student ID: $student_id";
    ?>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>