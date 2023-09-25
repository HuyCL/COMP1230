<?php
    require 'functions.inc.php';
    $colorList = get_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Week 9 Lab</title>
    <meta name="description" content="Practice using Bootstrap">
    <meta name="author" content="Your name">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <?php foreach($colorList[0] AS $column): ?>
                    <th><?= $column?></th>
                <?php endforeach; ?>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php array_shift($colorList) ?>
            <?php foreach($colorList as $key => $color): ?>
                <tr style="background-color:<?= $color[1]?>">
                    <td><?= $color[0]?></td>
                    <td><?= $color[1]?></td>
                    <td><?= $color[2]?></td>
                    <td>
                        <button type="button" class="btn btn-light">Edit</button>
                        <button type="button" class="btn btn-dark">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>