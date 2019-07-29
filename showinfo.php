<?php 
include_once "pdoClass.php";
$id = $_GET['id'];
$dbh = new Db('127.0.0.1','root','bmh');
$data = $dbh->getone('news',"n_id=$id");

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
			<tr>
				<td>新闻ID</td>
				<td>新闻名称</td>
				<td>新闻时间</td>
			</tr>
			<tr>
				<td><?php echo $data['n_id'];?></td>
				<td><?php echo $data['n_name'];?></td>
				<td><?php echo $data['n_time'];?></td>
			</tr>
		</table>
	</center>
</body>
</html>