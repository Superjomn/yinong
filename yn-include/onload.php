<?php
session_start();
$_SESSION['onload']=FALSE;
require 'Database.php';
$str="select * from user where user_name='$name'";
$db=new Database();
$handle=$db->query($str);
$res=mysql_fetch_object($handle);
//echo $name.$pwd;
$lev=-2;
//echo $res->new_pwd;
//echo 'the sended pwd is ',$pwd;
if($res->new_pwd==$pwd){
	//echo $res->level;
    $lev= $res->level;
	//echo 'the lev is ',$res->level;
    $_SESSION['onload']=TRUE;
    $_SESSION['user_name']=$name;
    $_SESSION['user_id']=$res->id;
    //echo $_SESSION['user_name'];
    //echo $_SESSION['user_id'];
}
echo $lev;


?>
