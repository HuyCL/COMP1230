                                                                <!-- UPLOAD PAGE - Enable User To Upload File -->

<?php
    $flag = false;
    if(!empty($_POST)) {
        $target_dir = "./";
        $file = $_FILES['upload_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['upload_file']['tmp_name'];
        // Check for correct file extension
        if($ext != 'csv') {
            $flag = true;
        }
        // Download and replace existing file
        else {
            move_uploaded_file($temp_name, "./tvs." . $ext);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Upload</title>
    <meta name="description" content="User uploading CSV file">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Upload File</h1><hr>
    <form class="col-lg-6 offset-lg-3" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <h3 class="text-center">Please choose a CSV file...</h3><br>
        </div>
        <div class="row justify-content-center">
            <?php
                // Display error message if user uploaded wrong file type
                if($flag) echo '<p class="text-danger">Error! CSV file only...</p>';
            ?>
        </div>
        <div class="row justify-content-center">
            <input type="file" name="upload_file" id="upload_file"><br>
        </div>
        <br>
        <div class="row justify-content-center">
            <input class="btn btn-dark" type="submit" value="Upload" name="submit">
            <a class="btn btn-danger" style="margin-left:5px;" href="main.php" role="button">Cancel</a>
        </div>
    </form>
    <hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>