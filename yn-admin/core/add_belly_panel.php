<?php
session_start();
$owner=$_SESSION['user_name'];
$owner_id=$_SESSION['user_id'];
require 'core.php';
function save($name,$leftimg,$fronimg,$topimg,$backimg,$description,$sort,$tag,$old,$sendto,$exchangefor,$miaoshu,$price,$owner,$owner_id){
	$description=$description;
    $str="insert into goods (name,leftimg,fronimg,topimg,backimg,description,sort,tag,old,sendto,exchangefor,miaoshu,price,owner,ownerid,status)values('$name','$leftimg','$fronimg','$topimg','$backimg','$description','$sort','$tag','$old','$sendto','$exchangefor','$miaoshu','$price','$owner',$owner_id,'on')";
    echo $str;
    $db=new Database();
    $db->query($str);
}
save($name,$leftimg,$fronimg,$topimg,$backimg,$description,$sort,$tag,$old,$sendto,$exchangefor,$miaoshu,$price,$owner,$owner_id);

?>
