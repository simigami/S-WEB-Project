<?php
$connect=mysqli_connect("localhost","root","mysql","helloworld");
$id=$_POST['id'];
$pwd=$_POST['pwd'];
$pwc=$_POST['pwc'];
$date=date('Y-m-d H:i:s');
if($id==NULL || $pwd==NULL || $pwc==NULL){
?><
        <script>
                alert('PLEASE FILL OUT ALL OF YOU BLANKS');
                location.replace('./login.html');
        </script>
<?php
	exit(-1);
}
else if($pwd!=$pwc){
?>
	<script>
		alert('PASSWORD AND PASSWORD CONFIRM IS DIFFERENT EACH OTHER');
		location.replace('./login.html');
	</script>
<?php
	exit(-1);
}
$check="SELECT * from userinfo WHERE id='$id'";
$result=$connect->query($check);
if($result->num_rows>=1){
?>
        <script>
                alert('THIS ID IS ALREADY ON USE');
                location.replace('./login.html');
        </script>
<?php
	exit(-1);
}
else{
	$signquery="insert into userinfo (id,pwd,date,permit) values ('$id','$pwd','$date',2)";
	$signup=$connect->query($signquery);
	if($signup){
?>
        <script>
                alert('REGESTERATION COMPLETE!');
                location.replace('./main.php');
        </script>
<?php
	}
}
?>
