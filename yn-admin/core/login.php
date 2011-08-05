<?php
session_start();
$kind=$_POST['kind'];
if($kind=='loginout'){
	//清空登录信息
	echo '开始处理啦。';
	$_SESSION['onload']=$_SESSION['user_id']=$_SESSION['user_name']=NULL;
	$_SESSION['onload']=false;
	//header('location:../denglu');	
	session_destroy();  
}
?>