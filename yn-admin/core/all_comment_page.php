<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
?>
<?php $filename='control_panel';?>
<?php
require_once '../../yn-include/Base.php';
require_once '../../yn-include/Comment.php';
require_once '../../yn-include/User.php';
require_once '../../yn-include/Good.php';
require_once '../../yn-include/Lookfor.php';
require_once '../../yn-include/Base.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
$base=new Base();

//计算出总页数
//lookfor总数量
$num=$base->get_count("select count(*) from comment where status='on'");
//每页数目
$pages_each=7;
$page_last=7;
//总页数
$pages=(int)($num/$pages_each)+1;
//需要接受页面
$page_cur=$_POST['page_cur'];
//偏移量为page-1
//最后一页的处理
$page_last=$num-$pages_each*($page_cur-1);
if($page_last>$pages_each){
    $page_last=7;
}
//开始呈现页面    
?>
<tr class="table_topper"><td>选择</td><td>光顾着</td><td>操作</td><td>内容</td></tr>
     <?php
	   print_r($comment->get_comments('on',$pages_each*($page_cur-1), $pages_each));
           for($i=0;$i<$comment->return_count();$i++){
             $comment->get_comment('comments', $i);
      ?>
    <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $comment->get_id(); ?>" /></td>
        <td><a href="#"><?php echo $comment->get_fromname(); ?></a></td>
      <td><button type="button">查看</button></td>
      <td><?php $comment->get_cotent(); ?></td>
     
    </tr>
    
<?php
}
?>

