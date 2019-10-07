<!DOCTYPE html> 
<html>
<head>
	<title>HELLWORLD BULLETIN!</title>
        <meta charset = 'utf-8'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
<style>
      .a {
        margin: 70px 0px;
        text-align: center;
        font-size: 140px;
        color: #2196F3;
      }
</style>
</head>
<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>
<body>
<?php
$connect = mysqli_connect("localhost", "root", "mysql","helloworld") or die ("connection fail");
$query ="select * from bulletin order by number desc";
$result = $connect->query($query);
$total = mysqli_num_rows($result);

session_start();
if(isset($_SESSION['userid'])) {
echo $_SESSION['userid'];
?> 님 안녕하세요<br/>
<button onclick="location.href='./logout.php'">로그아웃</button><br/>
<?php
}
else {
?>
<button onclick="location.href='./login.html'">로그인</button><br/>
<?php
}
?>
       	<h2 align=center>HELLO WORLD 게시판</h2>
        <table align = center>
        <thead align = "center">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "500" align = "center">제목</td>
        <td width = "100" align = "center">작성자</td>
        <td width = "200" align = "center">날짜</td>
        <td width = "50" align = "center">조회수</td>
        </tr>
        </thead>
 
        <tbody>
        <?php
			if($_GET['search']!=null&&$_GET['search-type']!=null){
					if ($_GET['search-type']=='제목'){
							$type="title";
							}
					else if ($_GET['search-type']=='작성자'){
							$type="id";
							}
					else if ($_GET['search-type']=='내용'){
							$type='content';
							}
					$query="select * from bulletin where ".$type." like '%".$_GET['search']."%'";
					$result=$connect->query($query);
					$total=mysqli_num_rows($result);
					}
                while($rows = mysqli_fetch_assoc($result)){
			if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href ="view.php?number=<?php echo $rows['number']?>">
	<?php 		echo $rows['title'];
	?></a>
	<?php
		if($rows['filename'] != NULL){
	?>		<i class="fas fa-file-download"></i>
	<?php
		}
	?>
		</td>
                  <td width = "100" align = "center"><?php echo $rows['id']?></td>
                <td width = "200" align = "center"><?php echo $rows['date']?></td>
                <td width = "50" align = "center"><?php echo $rows['hit']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
        <div class = text>
        <a href='./write.php'>글쓰기</a>
        </div>
		<div align="center">
		<form action="main.php">
			<input type="text" size="50" name="search" placeholder="검색">
			<select name="search-type">
				<option value="제목">제목</option>
				<option value="작성자">작성자</option>
				<option value="내용">내용</option>
			</select>
			<input type=submit value="검색">
		</form>
		</div>
</body>
</html>
