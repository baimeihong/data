<?php
include_once "pdoClass.php";
$dbh = new Db('127.0.0.1','root','bmh');

//print_r($dbh->getAll('news'));

$data=$dbh->getAll('news');

//var_dump($data);

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
				<td>详情</td>
			</tr>
			<?php foreach ($data as $key => $value) {?>
			<tr>
				<td><?php echo $value['n_id'];?></td>
				<td><?php echo $value['n_name'];?></td>
				<td><?php echo $value['n_time'];?></td>
				<td><a href="showinfo.php?id=<?php echo $value['n_id'];?>">详情</a></td>
			</tr>
			<?php }?>
		</table>
	</center>
</body>
</html>
