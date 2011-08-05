<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//unlink("http://localhost:8080/yinong/text1.txt");
	$path='http://localhost:8080/yinong/index.php';
	echo 'the path is ',$path,'<br/>';
	echo 'the size is ',strlen($path),'<br/>';
	echo substr($path,6,strlen($path)),'<br/>';
	echo $_SERVER['REMOTE_HOST'];
	echo $_SESSION['PHP_SELF'];
	
	
	?>
	
	
	<?php    
echo "(1)浏览当前页面的用户的 IP 地址为：";
echo $_SERVER['REMOTE_ADDR'];
echo "<br />";
echo "(2)浏览当前页面的用户的 IP 地址为：";
echo getenv('REMOTE_ADDR');
echo "<br />";
echo "(3)主机 www.baidu.com 的 IP 地址为：";
echo gethostbyname('www.nowamagic.net');
echo '<br/>';
echo $_SERVER['REMOTE_PORT'];
?>

</body>
</html>
