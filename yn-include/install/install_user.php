<?php
$kind=$_POST['kind'];
if($kind=2)
{
	//echo $_SESSION['dbname'];
	//如果 管理员的信息也传过来，立即写入文件
	$user=$_POST['user'];
	$pwd=$_POST['pwd'];
	//echo $user,$pwd;
	require('../Database.php');
	$db=new Database();
	$db->query("insert into user(user_name,new_pwd,level)values('$user','$pwd',3)");
	/*
	$xmlstr="<?xml version='1.0' encoding='utf-8'?>";
	$xmlstr.="<yinong>";
	$xmlstr.="<dbname>".$_SESSION['dbname']."</dbname>";
	$xmlstr.="<dbuser>".$_SESSION['dbuser']."</dbuser>";
	$xmlstr.="<dbpwd>".$_SESSION['dbpwd']."</dbpwd>";
	$xmlstr.="<dbmain>".$_SESSION['dbmain']."</dbmain>";
	$xmlstr="<user>".$_SESSION['user']."</user>";
	$xmlstr="<pwd>".$_SESSION['pwd']."</pwd>";
	$xmlstr="</yinong>";
	*/
		
	echo 'ok';
}
?>