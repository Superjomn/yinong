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
require_once '../../yn-include/Option.php';
$option=new Option();

$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
$base=new Base();

//计算出总页数
//lookfor总数量
$num=4*$base->get_count("select count(*) from goods where status='on'");
//每页数目
$pages_each=2;
$page_last=$pages_each;
//总页数
$pages=(int)($num/$pages_each)+1;
//需要接受页面
$page_cur=$_POST['page_cur'];
//偏移量为page-1
//最后一页的处理
$page_last=$num-$pages_each*($page_cur-1);
if($page_last>$pages_each){
    $page_last=$pages_each;
}
//开始呈现页面    
?><table id="pic_table">
<tr class="table_topper"><td>选择</td><td>图片</td><td>操作</td><td>宝贝</td><td>发布者</td></tr>
     <?php
	   $good->get_goods('on', $pages_each*($page_cur-1), $pages_each);
           for($i=0;$i<$good->good_count();$i++){
             $good->get_good('goods', $i);
      ?>
    <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $good->get_leftimg(); ?>" /></td>
        <td><a href="<?php $good->get_leftimg();?>"><img src="<?php $good->get_leftimg(); ?>" /></a></td>
      <td>
      	<button class="a" hr="../good?id=<?php echo $good->get_id(); ?>" type="button">查看</button>&nbsp;
         </td>
      <td><a href="../good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name();?></a></td>
      <td><?php $good->get_owner(); ?></td>
    </tr>
    
        <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $good->get_leftimg(); ?>" /></td>
        <td><a href="<?php $good->get_fronimg();?>"><img src="<?php $good->get_leftimg();?>" /></a></td>
      <td>
      	<button class="a" hr="../good?id=<?php echo $good->get_id(); ?>" type="button">查看</button>&nbsp;
         </td>
      <td><a href="../good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name();?></a></td>
      <td><?php $good->get_owner(); ?></td>
    </tr>
    
        <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $good->get_leftimg(); ?>" /></td>
        <td><a href="<?php $good->get_topimg();?>"><img src="<?php $good->get_leftimg();?>" /></a></td>
      <td>
      	<button class="a" hr="../good?id=<?php echo $good->get_id(); ?>" type="button">查看</button>&nbsp;
         </td>
      <td><a href="../good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name();?></a></td>
      <td><?php $good->get_owner(); ?></td>
    </tr>

        <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $good->get_leftimg(); ?>" /></td>
        <td><a href="<?php $good->get_backimg();?>"><img src="<?php $good->get_leftimg();?>" /></a></td>
      <td>
      	<button class="a" hr="../good?id=<?php echo $good->get_id(); ?>" type="button">查看</button>&nbsp;
         </td>
      <td><a href="../good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name();?></a></td>
      <td><?php $good->get_owner(); ?></td>
    </tr>

    
<?php
}
?>
</table>

