                                                                <!-- ITEM PAGE - View Specific Item -->

<?php
    require 'inc/functions.inc.php';
    // Check for request method type
    // Request sent through search bar is POST
    // Request sent through table link is GET
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search_item = trim(filter_input(INPUT_POST, 'search_item', FILTER_SANITIZE_STRING));
    }
    else {
        $search_item = trim(filter_input(INPUT_GET, 'search_item', FILTER_SANITIZE_STRING));
    }
    $item = search_record($search_item);
    if ($item === null) {
        echo '<script>alert("Unable to find item");location.href="main.php";</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>View Item</title>
    <meta name="description" content="View page for displaying information">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Item #<?= $item[1] ?></h1>
    <div class="row">
            <div class="col-md-12">
                &nbsp;&nbsp;<a class="btn btn-primary" href="main.php" role="button">Back</a>
            </div>
        </div><br>
    <table class="table">
        <tbody>
            <tr>
                <th class="bg-light" scope="row">Type</th>
                <td class="col-xs-2"><?= $item[2] ?></td>
            </tr>
            <tr>
                <th class="bg-light" scope="row">Brand</th>
                <td><?= $item[3]?></td>
            </tr>
            <tr>
                <th class="bg-light" scope="row">Model</th>
                <td><?= $item[4]?></td>
            </tr>
            <tr>
                <th class="bg-light" scope="row">Size</th>
                <td><?= $item[5]?></td>
            </tr>
            <tr>
                <th class="bg-light" scope="row">Price</th>
                <td><?= $item[6]?></td>
            </tr>
            <tr>
                <th class="bg-light" scope="row">Sale</th>
                <td><?= $item[7]?></td>
            </tr>
            <tr>
                <th class="bg-light" scope="row">Description</th>
                <td><?= $item[8]?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>