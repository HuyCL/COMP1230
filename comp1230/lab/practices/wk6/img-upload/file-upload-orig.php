<?php
function create_thumbnail_img($s_type, $sw, $sh) {
    $new_w = 100;
    $new_h = 100;
    $resized_img = imagecreatetruecolor($new_w, $new_h); // create canvas
    imagecopyresampled($resized_img, $s_type, 0, 0, 0, 0, $new_w, $new_h, $sw, $sh);
    return $resized_img;
}
if(isset($_POST["submit"])) {
    $success = false;
    if(is_array($_FILES)) {
        $fileName = $_FILES['upload_image']['tmp_name']; 
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "./uploads/";
        $fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $s_type = imagecreatefromjpeg($fileName); 
                $resized_img = create_thumbnail_img($s_type,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($resized_img,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_GIF:
                $s_type = imagecreatefromgif($fileName); 
                $resized_img = create_thumbnail_img($s_type,$sourceImageWidth,$sourceImageHeight);
                imagegif($resized_img,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_PNG:
                $s_type = imagecreatefrompng($fileName); 
                $resized_img = create_thumbnail_img($s_type,$sourceImageWidth,$sourceImageHeight);
                imagepng($resized_img,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;
 
            default:
                $success = false;
                break;
        }
        move_uploaded_file($fileName, $uploadPath. $resizeFileName. ".". $fileExt);
        $success = true;
    }
    if($success){
        echo "<div>Image Resized Successfully</div>";
     }else{
        echo "<div>Invalid Image </div>";
        $success = false;
     }
}    

?>
<form method="post" enctype="multipart/form-data">
    Choose Image: <input type="file" name="upload_image" required>
 <input type="submit" name="submit" class="btn btn-primary" value="Submit">
</form>