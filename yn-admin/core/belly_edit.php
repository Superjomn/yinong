<?php
session_start();
//$owner=$_POST['owner'];
//$owner_id=$_POST['ownerid'];
//$id=$_POST['id'];
require 'core.php';
function save($id,$name,$leftimg,$fronimg,$topimg,$backimg,$description,$sort,$tag,$old,$sendto,$exchangefor,$miaoshu,$price,$owner,$ownerid){
	$fron="delete from goods where id=$id";
	
    $str="insert into goods (id,name,leftimg,fronimg,topimg,backimg,description,sort,tag,old,sendto,exchangefor,miaoshu,price,owner,ownerid,status)values($id,'$name','$leftimg','$fronimg','$topimg','$backimg','$description','$sort','$tag','$old','$sendto','$exchangefor','$miaoshu','$price','$owner',$ownerid,'on')";
    echo $str;
    $db=new Database();
	//先删除原数据
	$db->query($fron);
	//插入数据
    $db->query($str);
}
save($id,$name,$leftimg,$fronimg,$topimg,$backimg,$description,$sort,$tag,$old,$sendto,$exchangefor,$miaoshu,$price,$owner,$ownerid);

?>
