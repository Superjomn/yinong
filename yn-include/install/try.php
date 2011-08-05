<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>xml解析</title>
</head>

<body>
<?php
	$xml = new DOMDocument(); 
	$xml->load("yn-config.xml");
	$yn= $xml->getElementsByTagName("yinong"); 
	//数据库名称
	$dbname=$xml->getElementsByTagName("dbname")->item(0)->nodeValue ; 
	//数据库用户名
	$dbuser=$xml->getElementsByTagName("dbuser")->item(0)->nodeValue ; 
	//数据库密码
	$dbpwd=$xml->getElementsByTagName("dbpwd")->item(0)->nodeValue ;
	//主机
	$dbmain=$xml->getElementsByTagName("dbmain")->item(0)->nodeValue ;
	//管理员姓名
	$user=$xml->getElementsByTagName("user")->item(0)->nodeValue ;
	//密码
	$pwd=$xml->getElementsByTagName("pwd")->item(0)->nodeValue ;
	
	echo $pwd;



?>
</body>
</html>