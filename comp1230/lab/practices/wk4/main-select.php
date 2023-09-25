<?php
// declare(strict_types=1);
require 'inc/data.inc.php';
require 'inc/functions.inc.php';
//  var_dump($user_types);
if(count($_GET) > 0){
    foreach($_GET as $key => $val){
        $val = filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING);
        if($val && array_key_exists($key, $users[0])){
            filtered_records($key, $val);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Functions</title>
    <meta name="description" content="Working with functions">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form>
        <label for="user_type">Filter by: </label>
        <?php
            foreach($user_types as $type){
                echo "<input type=\"radio\" id=\"user_type \"name=\"user_type\" value=\"$type\">" . ucfirst($type); 
            }
        ?>
        <?php
            foreach($statuses as $status){
                echo "<input type=\"radio\" name=\"status\" value=\"$status\">" . ucfirst($status);
            }
        ?>
        <input type="submit" value="Submit">
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First</th>
                <th>Last</th>
                <th>User</th>
                <th>Status</th>
                <th>Client</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user["id"]?></td>
                    <td><?= $user["f_name"]?></td>
                    <td><?= $user["l_name"]?></td>
                    <td><?= $user["user_type"]?></td>
                    <td><?= $user["status"]?></td>
                    <td><?= $user["client"]?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
</body>
</html>

<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>