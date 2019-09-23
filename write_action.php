<?php
$connect=mysqli_connect("localhost","root","mysql","helloworld");
$id=$_POST['name'];
$pwd=$_POST['pwd'];
$title=$_POST['title'];
$content=$_POST['content'];
$date=date('Y-m-d H:i:s');
$url='./main.php';

$query = "insert into bulletin (number, title, content, date, hit, id, pwd) values(null,'$title', '$content', '$date',0, '$id', '$pwd')";

$result = $connect->query($query);
if($result){
?>	<script>
		alert("<?php echo "글이 등록되었습니다."?>");
		location.replace("<?php echo $url?>");
	</script>
<?php
}
else{
	echo "FAIL";
}
mysqli_close($connect);
?>
