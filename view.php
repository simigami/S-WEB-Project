<?php
$connect=mysqli_connect("localhost","root","mysql","helloworld");
$number=$_GET['number'];
session_start();
$query="select title, content, date, hit, id, filename, filepath from bulletin where number='$number'";
$result=$connect->query($query);
$rows=mysqli_fetch_assoc($result);
if($rows['id']=="root"){
        if($_SESSION['userid']!=$rows['id']){
	?>	<script>
			alert('Permission Denied, Root ONLY!');
			location.replace("./main.php");
		</script>
<?php
		exit(-1);
	}
}
$newhit=$rows['hit']+1;
$hit = "update bulletin SET hit ='$newhit' where number='$number'";
$hitquery=$connect->query($hit);
?>

<table class="view_table" align=center>
        <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title']?></td>
        </tr>
        <tr>
                <td class="view_id">작성자</td>
                <td class="view_id2"><?php echo $rows['id']?></td>
                <td class="view_hit">조회수</td>
                <td class="view_hit2"><?php echo $newhit?></td>
        </tr>
 
 
        <tr>
                <td colspan="4" class="view_content" valign="top">
                <?php echo $rows['content']?></td>
        </tr>
        </table>
<?php
if($rows['filename']!=NULL){
?>
	<div class="view_btn">
<?php
		echo $rows['filename'];
?>
                <button class="view_btn1" onclick="location.href='./download.php?number=<?php echo $number?>'">첨부파일 다운로드</button>
<?php
}
?>
	<div class="view_btn">
                <button class="view_btn1" onclick="location.href='./main.php'">목록으로</button>
<?php
if($_SESSION['userid']==root || $_SESSION['userid']==$rows['id']){

?>
<button class="view_btn1" onclick="location.href='./delete.php?number=<?php echo $number?>'">게시글 삭제</button>
<?php
}
?>
