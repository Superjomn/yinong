<?php
	require_once '../../yn-include/Database.php';
	require_once '../../yn-include/Base.php';
	$base=new Base();
	$date=$base->date();
	$str="insert into comment(goodid,fromid,fromname,touserid,status,kind,date,comment)values($goodid,$fromid,'$fromname',$touserid,'on','$kind','$date','$comment')";
	echo $str;
	$db=new Database();
	$db->query($str);
?>