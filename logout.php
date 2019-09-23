<?php
session_start();
$result=session_destroy();
if($result){
?>
	<script>
		alert('Logout success');
		history.back();
	</script>
<?php
}
?>
