<?php
function create_thumbnail_img($s_img, $sw, $sh) {
    // Calculate height and width ratios for 100x100 maximum
    $w_ratio = $sw / 100;
    $h_ratio = $sh / 100;
    $ratio = 0;
    // If image width or height is larger than 100
    if ($w_ratio > 1 || $h_ratio > 1) {
        // set the ratio based on the longer side
        $ratio = max($w_ratio, $h_ratio);
        // divide both width/height by the same ratio
        $new_height = round($sh / $ratio); 
        $new_width = round($sw / $ratio);
        // Create a new image canvas
        $new_image = imagecreatetruecolor($new_width, $new_height);
        $dx = $dy = $sx = $sy = 0;
        // Copy from original image to new image to resize the file
        imagecopyresampled($new_image, $s_img, 
                        $dx, $dy, $sx, $sy, $new_width, $new_height, $sw, $sh);

        return $new_image;
    }

    return $s_img; // original img was too small. No resizing. Send back orig
}
if(isset($_POST["submit"])) {

    if(is_array($_FILES)) {
        $upload_path = "./uploads/images/";
        $tmp_name = $_FILES['upload_image']['tmp_name']; 
        $file_info = getimagesize($tmp_name);
        $s_img_w = $file_info[0];
        $s_img_h = $file_info[1];
        $file_type = $file_info[2]; // MIME Type
        $file_name = basename($_FILES['upload_image']['name']);

        switch($file_type) {
            case IMAGETYPE_JPEG:
                $image_from_file = 'imagecreatefromjpeg';
                $image_to_file = 'imagejpeg';
                break;
            case IMAGETYPE_GIF:
                $image_from_file = 'imagecreatefromgif';
                $image_to_file = 'imagegif';
                break;
            case IMAGETYPE_PNG:
                $image_from_file = 'imagecreatefrompng';
                $image_to_file = 'imagepng';
                break;
            default:
                echo 'File must be a JPEG, GIF, or PNG image.';
                exit;
        }

        $s_img = $image_from_file($tmp_name);
        $resized_img = create_thumbnail_img($s_img, $s_img_w, $s_img_h);
        $image_to_file($resized_img, $upload_path . "thumb_" . $file_name);
        move_uploaded_file($tmp_name, $upload_path. $file_name);
        echo "<div>Image uploaded and a thumbnail created successfully</div>";
        
    }
    else{
        echo 'File was not uploaded successfully! Try again';
    }

}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image upload</title>
    <meta name="description" content="Uploading image">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="upload_image" required>
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>

<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>