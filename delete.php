<?php
$del=$_GET['title'];
session_start();
$connect=mysqli_connect("localhost","root","mysql","helloworld");
$query = "delete from bulletin where title='$del'";
$result = $connect->query($query);
?>
<script>
	alert('DELETE COMPLETE');
	location.replace("./main.php");
</script>
