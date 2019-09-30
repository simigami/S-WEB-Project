<?php
$connect=mysqli_connect("localhost","root","mysql","helloworld");
$id=$_POST['name'];
$pwd=$_POST['pwd'];
$title=$_POST['title'];
$content=$_POST['content'];
$date=date('Y-m-d H:i:s');
$uf=$_FILES['ufile'];
$url='./main.php';
$flag=0;
if(empty($title)){
?>
	<script>
		alert("제목에 아무것도 입력하지 않았습니다");
		history.go(-1);
	</script>
<?php
		exit(-1);
}
if(!empty($uf['name'])){
	$now=getcwd();
	$name=$uf['name'];
	$dir=$now.'/uploadfile/'.$name;
	$maxfilesize=10485760;
	if($uf['size']>=$maxfilesize){
?>
	<script>
		alert("최대 10MB 까지 업로드 가능 합니다");
		history.go(-1);
	</script>
<?php
		exit(-1);
	}
	if(move_uploaded_file($_FILES['ufile']['tmp_name'], $dir)){
		$flag=1;
		echo "successs";
	}
	else{
?>	
	<script>
		alert("파일이 성공적으로 업로드 되지 않았습니다");
		history.go(-1);
	</script>
<?php
		exit(-1);
	}
}
if(empty($content)){
?>	
	<script>
		alert("파일이 성공적으로 업로드 되었습니다");
		location.replace("<?php echo $url?>");
	</script>
<?php
}
else if(!empty($content)){
	$query = "insert into bulletin (number, title, content, date, hit, id, pwd) values(null,'$title', '$content', '$date',0, '$id', '$pwd')";

	$result = $connect->query($query);
	if($result){
		if($flag==1){
?>	
			<script>
				alert("<?php echo "파일과 글이 등록되었습니다"?>");
				location.replace("<?php echo $url?>");
			</script>
<?php
		}
		else if($flag==0){
?>	
		<script>
			alert("<?php echo "글이 등록되었습니다"?>");
			location.replace("<?php echo $url?>");
		</script>
<?php
		}
	}
	else{
		echo "FAIL";
	}
	mysqli_close($connect);
}
?>