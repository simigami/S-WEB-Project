<?php
$number=$_GET['number'];
$connect=mysqli_connect("localhost","root","mysql","helloworld");
$query="select * from bulletin where number='$number'";
$result=$connect->query($query);
$rows=mysqli_fetch_assoc($result);

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$rows['filename'].'"');
header('Content-Transfer-Encoding: binary');
header('Content-length:'.filesize($rows['filepath']));
header('Expires: 0');
header("Pragma: public");

$fp=fopen($rows['filepath'], 'rb');
fpassthru($fp);
fclose($fp);

?>
