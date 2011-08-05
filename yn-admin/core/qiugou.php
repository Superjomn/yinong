<?php
require_once '../../yn-include/Base.php';
$base=new Base();
$description=$base->text_p($description);
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
require_once '../../yn-include/Database.php';
$db=new Database();
$date=date("Y/m/d");
$str="insert into lookfor (fromname,fromid,name,description,tag,sort,status,date) values('$user_name',$user_id,'$name','$description','$tag','$sort','$status','$date')";
$db->query($str);
echo $str;

?>
