<?php
$uf=$_FILES['ufile'];
$url='./main.php';
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
		echo "Success";
	}
	else{
		echo "Failed";
	}
}
?>
