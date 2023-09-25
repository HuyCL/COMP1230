<?php
$path = 'uploads/thumb_*';

$filenames = glob($path);
// returns an array containing list of files/dir names matching pattern 
// print_r($filenames);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image upload</title>
    <meta name="description" content="Uploading image">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            width: 80%;
            margin: auto auto;
        }
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 5px;
        }
        .grid-item {
            background-color: lightgray;
            border: 2px solid gray;
            padding: 20px;
            text-align: center;
        }
        footer{
            height: 200px;
        }
    </style>

</head>
<body>
    <h1>Image Gallery</h1>
    <div class="grid-container">
    <?php
        foreach ($filenames as $filename) {
            echo "<div class='grid-item'>";
            echo "<img src='$filename' alt='" . basename($filename) . "'></div>";
        }
    ?>
    </div>

    <footer></footer>

</body>
</html>

<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>