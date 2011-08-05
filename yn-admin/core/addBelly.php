<?php
session_start();
$owner=$_SESSION['user_name'];
$owner_id=$_SESSION['user_id'];
require 'core.php';
require '../../yn-include/Base.php';
$base=new Base();
$date=$base->date();
//判断发表状态
$kind=$_POST['kind'];
function save($name,$leftimg,$fronimg,$topimg,$backimg,$description,$sort,$tag,$old,$sendto,$exchangefor,$miaoshu,$price,$owner,$owner_id,$kind){
	if($kind=='save_draft')
		$status='draft';
	else
	if($kind=='save_output')
		$status='on';
    $str="insert into goods (name,leftimg,fronimg,topimg,backimg,description,sort,tag,old,sendto,exchangefor,miaoshu,price,owner,ownerid,status,date)values('$name','$leftimg','$fronimg','$topimg','$backimg','$description','$sort','$tag','$old','$sendto','$exchangefor','$miaoshu','$price','$owner',$owner_id,'$status','$date')";
    echo $str;
    $db=new Database();
    $db->query($str);
}
save($name,$leftimg,$fronimg,$topimg,$backimg,$description,$sort,$tag,$old,$sendto,$exchangefor,$miaoshu,$price,$owner,$owner_id,$kind);

?>
