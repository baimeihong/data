<?php
/**
* 
*/
class Test
{
	private $host;
	private $user;
	private $userpwd;
	private $dbh;
	
	function __construct($host,$user,$userpwd)
	{
		$this->host=$host;
		$this->user= $user ;
		$this->userpwd= $userpwd;
		$this->dbh = new PDO("mysql:host=$host;dbname=hhh",$user, $userpwd);
	}

	public function insert($arr,$table)
	{
		if (count($arr)==0) {
			return false;
		}
		if (empty($table)) {
			return false;
		}
		$filed='';
		$val = '';
		foreach ($arr as $key => $value) {
			$filed .= ",$key";
			$val .=",".$this->dbh->quote("$value");
		}
		$filed = substr($filed,1);
		$val = substr($val,1);

		$sql="insert into `$table`($filed) value($val)";
		
		return $this->dbh->exec($sql);
	}

	public function limit($table)
	{
	   $size=3;
	   $count = "select * from $table";
	   $last =ceil($count/$size);
	   $prev=$page-1>=1?1:$page-1;
	   $next=$next-1>=1?1:$next+1;
	   $limit = ($page-1)*$size;
	   $data = "select * from $table limit $limit,$size";
	   $arr=[
	       'page'=>$page,
	       'prev'=>$prev,
	       'next'=>$next,
	       'last'=>$last,
	       'count'=>$count,
	       'data'=>$data
	   ];

	   return $arr;

	}

	public function upData($arr,$table,$where)
	{
		if ($arr==''&&$table==''&&$where=='') {
			return false;
		}
		$filed='';
		foreach ($arr as $key => $value) {
			$filed=",$key='$value'";
			// print_r($filed);
		}
		$filed = substr($filed,1);

		$sql="update $table set $filed  where $where";
		// echo "$sql";
		return $this->dbh->exec($sql);
	}
	public function Check($arr)
	{
		print_r(strlen($arr));
	}

}
$db = new Test('127.0.0.1','root','root');
// $arr = array("title"=>'这是数据1');
// print_r($db->insert($arr,'title'));
print_r($db->limit('title'));
// print_r($db->upData($arr,'title',1));
// $arr="白美红";
// print_r($db->Check($arr));