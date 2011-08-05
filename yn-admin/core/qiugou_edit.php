<?php
session_start();
$user_name=$_POST['username'];
$user_id=$_POST['userid'];
$id=$_POST['id'];
require_once '../../yn-include/Database.php';
$db=new Database();
$date=date("Y/m/d");
//删除的字段
$str1="delete from lookfor where id=$id";
$str="insert into lookfor (id,fromname,fromid,name,description,tag,sort,status,date) values($id,'$user_name',$user_id,'$name','$description','$tag','$sort','$status','$date')";
$db->query($str1);
$db->query($str);
echo $str;

?>
