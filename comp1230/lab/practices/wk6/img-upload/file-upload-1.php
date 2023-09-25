<?php
function create_thumbnail_img($s_img, $sw, $sh) {
    $new_w = 100;
    $new_h = 100;
    $resized_img = imagecreatetruecolor($new_w, $new_h); // create canvas
    imagecopyresampled($resized_img, $s_img, 0, 0, 0, 0, $new_w, $new_h, $sw, $sh);
    return $resized_img;
}
if(isset($_POST["submit"])) {

    if(is_array($_FILES)) {
        $allowed_file_extensions = ["png", "jpg", "jpeg", "gif"];
        $upload_path = "./uploads/";
        $tmp_name = $_FILES['upload_image']['tmp_name']; 
        $file_info = getimagesize($tmp_name);
        $s_img_w = $file_info[0];
        $s_img_h = $file_info[1];
        $file_type = $file_info[2];
        $file_name = basename($_FILES['upload_image']['name']);

        $file_ext = strtolower(pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION));

        if(in_array($file_ext, $allowed_file_extensions)){
            if($file_ext === 'jpg' || $file_ext === 'jpeg'){
                $imagecreatefrom = 'imagecreatefromjpeg';
                $img_function = 'imagejpeg';
            }
            else{
                $imagecreatefrom = 'imagecreatefrom' . $file_ext;
                $img_function = 'image' . $file_ext;
            }
            
            $s_img = $imagecreatefrom($tmp_name);
            $resized_img = create_thumbnail_img($s_img,$s_img_w,$s_img_h);
            $img_function($resized_img,$upload_path."thumb_".$file_name);
            move_uploaded_file($tmp_name, $upload_path. $file_name);
            echo "<div>Image uploaded and a thumbnail created successfully</div>";
        }
        else{
            echo "<div>Invalid file type </div>";
        }    
        
    }

}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        footer{
            height: 200px;
        }
    </style>
    
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="upload_image" required>
        <input type="submit" name="submit" value="Submit">
    </form>
    <footer></footer>
</body>
</html>

<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>