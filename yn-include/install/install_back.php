<?php
	session_start();
?>

<?php

	$kind=$_POST['kind'];
if($kind==1){
	$_SESSION['dbname']=$_POST['dbname'];
	$_SESSION['dbuser']=$_POST['dbuser'];
	$_SESSION['dbpwd']=$_POST['dbpwd'];
	$_SESSION['dbmain']=$_POST['dbmain'];
	//查看是否取回相应值
	//echo $_SESSION['dbname'],$_SESSION['dbuser'],$_SESSION['dbpwd'],$_SESSION['dbmain'];
	/*
		工作原理：
		取回相应的值
		储存到一个类文件中
		开始导入sql程序
		将database与类文件进行连接
		
	*/
	
	$fp = fopen("yinong.sql","r") or die("system error");
	$sql=fread($fp,filesize("yinong.sql"));
	$handle=mysql_connect($_SESSION['dbmain'],$_SESSION['dbuser'],$_SESSION['dbpwd']);
	
?>
<?php
//自动导入程序
$servername=$_SESSION['dbmain'];
$dbusername = $_SESSION['dbuser'];//帐号
$dbpassword = $_SESSION['dbpwd'];//密码
$dbname = $_SESSION['dbname'];//数据库设备
 
$dbcharset = 'utf8';
$sqlfile = 'yinong.sql';//本机导出的Sql文件
 
if(!is_readable($sqlfile)) {
	exit('数据库文件不存在或者读取失败');
}
$fp = fopen($sqlfile, 'rb');
$sql = fread($fp, 2048000);
fclose($fp);
 
$conn=mysql_connect($servername,$dbusername,$dbpassword);//指定数据库连接参数
if (!$conn)
{
  die('Could not connect: ' . mysql_error());
  echo 'can not connect mysql';
}
 
function runquery($sql) {
	global $dbcharset, $db_prefix, $DB, $tablenum;
 
	$sql = str_replace("\r", "\n",$sql);
	$ret = array();
	$num = 0;
	foreach(explode(";\n", trim($sql)) as $query) {
		$queries = explode("\n", trim($query));
		foreach($queries as $query) {
			$ret[$num] .= $query[0] == '#' ? '' : $query;
		}
		$num++;
	}
	unset($sql);
 
	foreach($ret as $query) {
		$query = trim($query);
		if($query) {
			if(substr($query, 0, 12) == 'CREATE TABLE') {
				$name = preg_replace("/CREATE TABLE ([a-z0-9_]+) .*/is", "\\1", $query);
				//echo '创建表 '.$name.' ... <font color="#0000EE">成功</font><br />';
				mysql_query(createtable($query, $dbcharset));
				$tablenum++;
			} else {
				mysql_query($query);
			}
		}
	}
}
 
function createtable($sql, $dbcharset) {
	$type = strtoupper(preg_replace("/^\s*CREATE TABLE\s+.+\s+\(.+?\).*(ENGINE|TYPE)\s*=\s*([a-z]+?).*$/isU", "\\2", $sql));
	$type = in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM';
	return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).
		(mysql_get_server_info() > '4.1' ? " ENGINE=$type DEFAULT CHARSET=$dbcharset" : " TYPE=$type");
}
 
 
//mysql_select_db($dbname);
//测试数据库是否存在
if(!mysql_select_db($dbname))
	echo '<br/><b>数据库不存在</b>';
 
runquery($sql);//导入数据文件 
mysql_close($conn);
//开始写入php文件   定义为常量方式
	$file_handle=fopen('yn-config.php','w');
	//写入配置文件
	$cfstr="<?php define('DBNAME','$dbname');";
	$cfstr.="define('DBUSERNAME','$dbusername');";
	$cfstr.="define('DBPWD','$dbpassword');";
	$cfstr.="define('DBMAIN','$servername');?>";
	fwrite($file_handle,$cfstr);
	echo 'ok';
}
?>


	


