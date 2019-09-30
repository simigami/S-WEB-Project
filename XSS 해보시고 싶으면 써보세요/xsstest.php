<?php
session_start();
$xsstext=$_GET['xsstest'];
echo $xsstext;
?>
<br>
<button onclick="location.href='./main.php'">main page</button>
