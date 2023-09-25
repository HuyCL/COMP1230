<?php
$colour = 'white';
if(isset($_GET['colour'])){
  $colour = filter_input(INPUT_GET, 'colour', FILTER_SANITIZE_STRING);
  setcookie('bg-colour', $colour, time() + (60 * 60 * 24), "/"); // 1 day
}

if(isset($_COOKIE['bg-colour'])){
  echo "Cookie 'bg-colour' is set!<br>";
  echo "Value is: " . $_COOKIE['bg-colour'];
  $colour = filter_input(INPUT_COOKIE, 'bg-colour', FILTER_SANITIZE_STRING);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cookie</title>
    <style>
      body{
        background-color: <?= $colour ?>
      }
    </style>
</head>
<body>
    <h2>Pick a colour to be used as background</h2>
    <form>       
      <select name="colour">
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="gray">Gray</option>
        <option value="pink">Pink</option>
      </select>
      <button type="submit" name="submit" value="submit">Submit</button>     
    </form>    
</body>
</html>

<?php 
    echo "<hr>";
    show_source(__FILE__); 
?>
