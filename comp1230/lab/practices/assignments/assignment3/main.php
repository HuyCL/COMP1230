                                                                <!-- MAIN PAGE - View All Item Information -->

<?php
    require 'inc/functions.inc.php';
    $items = read_file();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>TV For Sale</title>
    <meta name="description" content="Display all data inside a CSV file in a tabular format">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .item-link {
        text-decoration: underline;
    }
    .sale {
        color: red;
    }
</style>
<body>
    <h1 class="text-center">List of TVs</h1>
    <form method="post" action="item-page.php">
        <div class="form-group row justify-content-end">
                <div class="col-sm-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_item" name="search_item" placeholder="Enter item number" required>&nbsp;&nbsp;
                        <input class="btn btn-primary" type="submit" value="Search" name="submit">&nbsp;
                    </div>
                </div>
            </div>
    </form>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item #</th>
                <th scope="col">Type</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
            <!-- Skip first iteration -->
            <?php if($item[0] == 0) continue; ?>
            <tr>
                <th scope="row"><?= $item[0]?></th>
                <!-- A link containing item number in URL parameter (unsafe) -->
                <td><a class="item-link" href="item-page.php?search_item=<?= $item[1] ?>"><?= $item[1]?></a></td>
                <td><?= $item[2]?></td>
                <td><?= $item[3]?></td>
                <td><?= $item[4]?></td>
                <td><?= $item[5]?>"</td>
                <?php 
                    // Check for sale price of an item
                    if(empty($item[7])) {
                        echo "<td>$" . $item[6] . "</td>";
                    }
                    else {
                        echo "<td class=\"sale\">$" . $item[7] . "</td>";
                    }
                ?>
                <td>
                    <!-- A link containing item data in URL parameter (unsafe) -->
                    <a href="update-record.php?<?= array_to_url_string($item) ?>">
                        <img src="img/edit-icon.png" alt="edit icon" width="25" height="25" />
                    </a>
                    <a href="delete-record.php?id=<?= $item[0]?>">
                        <img src="img/delete-icon.jpg" alt="delete icon" width="25" height="25" />
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
        <div class="row">
            <div class="col-md-12 bg-light text-center">
                <a class="btn btn-primary" href="add-record.php" role="button">Add Item</a>
                <a class="btn btn-primary" href="tvs.csv" role="button" download>Download</a>
                <a class="btn btn-dark" href="upload-file.php" role="button">Upload</a>
            </div>
        </div>
    <hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>