<?php
$myfile = "file2.txt";
if (isset($_POST['content'])) {
  $newData = htmlspecialchars($_POST['content']);
  $handle = fopen($myfile, "w") or die("Could not open/create file!");
  fwrite($handle, $newData);
  fclose($handle);
}

// ----------------------------
$file_content = file_exists($myfile)? file_get_contents($myfile): '';

?>
Use this form to edit the content of your file
<form  method="post">
  <textarea name="content" cols="60" rows="10"><?php echo $file_content; ?></textarea>
  <br><br>
  <input name="submit" type="submit" value="Save">
</form>
<br><br>

<?php
echo nl2br($file_content);
?>

