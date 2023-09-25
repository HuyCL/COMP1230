<?php
ini_set("date.timezone", "America/Toronto");
echo "REQUEST_TIME: " . date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
$header = apache_request_headers();
echo "<pre>";
print_r($header);
echo "</pre>";

echo "<hr>";
show_source(__FILE__); 