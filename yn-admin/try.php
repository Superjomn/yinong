<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
?>
<?php $filename='control_panel';?>
<?php

require_once '../yn-include/Base.php';
require_once '../yn-include/Comment.php';
require_once '../yn-include/Good.php';
require_once '../yn-include/User.php';
require_once '../yn-include/Lookfor.php';
;
$base=new Base();
$comment=new Comment();
$good=new Good();
$user=new User();
$lookfor=new Lookfor();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>尝试</title>
</head>
<script type="text/javascript" src="../yn-include/jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-pager/jquery.pager.js"></script>
<link type="text/css" type="text/css" rel="stylesheet" href="jquery/jquery-pager/Pager.css" />

<body>
<?php
/*留言系统  产生面向特定用户id的留言*/
/*
    $comment->get_user_comments('on',$user_id,0,6);
    for($i=0;$i<$comment->return_count();$i++){
       $comment->get_comment('comments', $i);
        $comment->get_cotent();
        $comment->get_fromname();
    }
 * */


    /*通过goodid 取回单独的东西
    $good->set_id(3);
    $good->get_good(2, 1);
    echo '取回的单独商品：<br/>';
    $good->get_name();

    //同过userid 取回单独的用户
    $user->set_id(1);
    $user->get_user();
    echo '取回的特定用户';
    $user->get_name();
    */
/*求购信息展示
 $lookfor->get_user_lookfors('on',$user_id,0,6);
    for($i=0;$i<$lookfor->return_count();$i++){
       $lookfor->get_lookfor('lookfors', $i);
        $lookfor->get_name();
        $lookfor->get_fromname();
    }
    */
/*回复数量*/
echo $comment->get_comment_num(13,'lookfor');
?>
<input type="checkbox" name="del" value="1" />
<input type="checkbox" name="del" value="2" />
<input type="checkbox" name="del" value="3" />
<input type="checkbox" name="del" value="4" />
<button type="button" id="button">确定</button>
<script type="text/javascript">
$(function(){
		   $("#button").click(function(){
					$("[name=del]").each(function(){
				if($(this).attr('checked')){
				 alert($(this).val());
				}
			});				   
		});
		   
});

</script>

<?php
$pagerid='pager';
$page_kind='goods';  //取得元素的状态
$page_status='on';
$pages_each=7;
$table_id='table';
$core_id='lookfor_all_page';
require 'core/pager.php';

?>
<table id="<?php echo $table_id;?>">

</table>




</body>
</html>