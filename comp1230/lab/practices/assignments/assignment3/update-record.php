                                                                <!-- UPDATE PAGE - Display Selected Item Data And Allow Modifications -->

<?php
require 'inc/functions.inc.php';

$validInputs = false;

if (!empty($_POST)) {
    // A flag checking all inputs are valid
    $validInputs = true;

    // Type & Brand does not need validation because the values are pre-defined
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // ===---=== Validate Inputs ===---===

    // Accept input - no space in the string, use the value to write to file
    // Reject input - space is found inside the string, reset variable for new input
    $model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING));
    if(strpos($model, ' ') !== false || $model == "") {
        unset($model);
        $validInputs = false;
    }

    // Accept input - string is numeric, use the value to write to file
    // Reject input - non-numeric character(s) found inside string, reset variable for new input
    $size = trim(filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING));
    if(!is_numeric($size)) {
        unset($size);
        $validInputs = false;
    }

    // Accept input - proper price format, use the value to write to file
    // Reject input - non-numeric character(s) other than a decimal, reset variable for new input
    $o_price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING));
    if (!is_numeric($o_price)) {
        unset($o_price);
        $validInputs = false;
    }
    $s_price = trim(filter_input(INPUT_POST, 'sale', FILTER_SANITIZE_STRING));
    if (!empty($s_price) && !is_numeric($s_price)) {
        unset($s_price);
        $validInputs = false;
    }
}
else {
    // Retrieve all of the parameters passed through URL
    $type = trim(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING));
    $brand = trim(filter_input(INPUT_GET, 'brand', FILTER_SANITIZE_STRING));
    $model = trim(filter_input(INPUT_GET, 'model', FILTER_SANITIZE_STRING));
    $size = trim(filter_input(INPUT_GET, 'size', FILTER_SANITIZE_STRING));
    $o_price = trim(filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRING));
    $s_price = trim(filter_input(INPUT_GET, 'sale', FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Update Item</title>
    <meta name="description" content="Display all data of chosen item inside a form, modification to the existing record is allowed">
    <meta name="author" content="Huy Lam">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .invalid-input {
        border: 1px solid red;
    }
    form {
        padding: 2.5%;
    }
    </style>
<body>
    <form method="post">
        <h2 class="text-center">Update Record - <?php echo $_GET['id']; ?></h2><br><br>
        <div class="form-group row">
            <label for="model" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-5">
            <input type="text" class="form-control <?php if(!empty($_POST) && !isset($model)) echo 'invalid-input'; ?>" id="model" name="model" placeholder="Enter model" value="<?php if(isset($model)) echo $model; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="size" class="col-sm-2 col-form-label">Size</label>
            <div class="col-sm-1">
                <div class="input-group">
                    <input type="text" class="form-control <?php if(!empty($_POST) && !isset($size)) echo 'invalid-input'; ?>" id="size" name="size" placeholder="Inches" value="<?php if(isset($size)) echo $size; ?>">
                    <div class="input-group-prepend">
                        <div class="input-group-text">"</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control <?php if(!empty($_POST) && !isset($o_price)) echo 'invalid-input'; ?>" id="price" name="price" value="<?php if(isset($o_price)) echo $o_price; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="sale" class="col-sm-2 col-form-label">Sale</label>
            <div class="col-sm-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control <?php if(!empty($_POST) && !isset($s_price)) echo 'invalid-input'; ?>" id="sale" name="sale" value="<?php if(isset($s_price)) echo $s_price; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type: </label>
            <div class="col-sm-10">
                <select class="form-select" id="type" name="type" aria-label="Default select example" required>
                    <option <?php echo (isset($type) && $type == '') ? 'selected' : ''; ?> value=''>Select one</option>
                    <option <?php echo (isset($type) && $type == 'LCD') ? 'selected' : ''; ?> value='LCD'>LCD</option>
                    <option <?php echo (isset($type) && $type == 'LED') ? 'selected' : ''; ?> value='LED'>LED</option>
                    <option <?php echo (isset($type) && $type == 'OLED') ? 'selected' : ''; ?> value='OLED'>OLED</option>
                    <option <?php echo (isset($type) && $type == 'QLED') ? 'selected' : ''; ?> value='QLED'>QLED</option>
                </select>
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Brand: </legend>
            <div class="col-sm-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="brand" id="radio1" value="LG" <?php if(isset($brand) && $brand == 'LG')  echo ' checked="checked"';?> required>
                <label class="form-check-label" for="radio1">LG</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="brand" id="radio2" value="SAMSUNG" <?php if(isset($brand) && $brand == 'SAMSUNG')  echo ' checked="checked"';?>>
                <label class="form-check-label" for="radio2">Samsung</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="brand" id="radio3" value="SONY" <?php if(isset($brand) && $brand == 'SONY')  echo ' checked="checked"';?>>
                <label class="form-check-label" for="radio3">Sony</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="brand" id="radio4" value="TOSHIBA" <?php if(isset($brand) && $brand == 'TOSHIBA')  echo ' checked="checked"';?>>
                <label class="form-check-label" for="radio4">Toshiba</label>
                </div>
            </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Additional information about the product..."><?php if(isset($description)) { echo htmlentities ($description); }?></textarea>
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-10">
            <input class="btn btn-success" type="submit" value="Update">
            <a class="btn btn-danger" href="main.php" role="button">Cancel</a>
            </div>
        </div>
        <?php
            // Only update file when new inputs have been validated 
            if($validInputs) {
                echo '<script>alert("Record has been successfully updated!");
                location.href="main.php";</script>';
                update_record($_GET['id'], $_GET['item'], $type, $brand, $model, $size, $o_price, $s_price, $description);
            }
        ?>
    </form>
    <hr>
    <script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>

<?php
    echo "<hr>";
    show_source(__FILE__);
?>