<?php
	session_start();
	$connect=mysqli_connect("localhost","root","mysql","helloworld");
	$id=$_POST['id'];
	$pwd=$_POST['pwd'];
	$query="select * from userinfo where id='$id'";
	$result=$connect->query($query);

	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_assoc($result);
		if($row['pwd']==$pwd){
			$_SESSION['userid']=$id;
			if(isset($_SESSION['userid'])){
			?>	<script>
					alert('Login success');
					location.replace("./main.php");
				</script>
<?php			
			}
			else{
				echo "Login failed";
			}
		}
		else{
	?>
			<script>
				alert('Incorrect ID or PASSWORD');
				history.back();
			</script>
<?php
		}
	}
	else{
?>
		<script>
			alert('Incorrect ID or PASSWORD');
			history.back();
		</script>
<?php
	}
?>			
