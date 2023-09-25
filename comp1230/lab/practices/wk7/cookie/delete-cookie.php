<?php
// echo "List of existing cookies in this browser:<br>";
// echo "<pre>";
// print_r($_COOKIE);
// echo "</pre>";
// Check if 'bg-colour' cookie exists, delete it);
if(isset($_COOKIE['bg-colour'])) {
  setcookie('bg-colour', '', time() - 100, "/");
  echo "'bg-colour' cookie is deleted";
}
 
echo "<hr>";
show_source(__FILE__); 
