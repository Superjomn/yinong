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
require_once '../../yn-include/Option.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
$base=new Base();
$option=new Option();

//计算出总页数
//lookfor总数量
$num=$base->get_count("select count(*) from goods where status='draf'");
//每页数目
$pages_each=(int)($option->get_back_belly_num());
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
?>
<table>
<tr class="table_topper"><td>选择</td><td>宝贝</td><td>操作</td><td>发布者</td><td>经验</td><td>留言数</td></tr>
     <?php
	   $good->get_goods('draf', $pages_each*($page_cur-1), $pages_each);
           for($i=0;$i<$good->good_count();$i++){
             $good->get_good('goods', $i);
      ?>
    <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $good->get_id(); ?>" /></td>
        <td><a href="#"><?php echo $good->get_name(); ?></a></td>
      <td><button class="a" hr="../good?id=<?php echo $good->get_id(); ?>" type="button">查看</button>&nbsp;<button class="a" hr="belly_edit_panel?good_id=<?php echo $good->get_id(); ?>" type="button">编辑</button></td>
      <td><?php $good->get_owner(); ?></td>
      <td>32</td>
      <td class="reply_num"><a href="#"><?php
                                            $goodid=$good->get_id();
                                            $str="select count(*) from comment where goodid=$goodid";
                                            //echo $str;
                                            echo $base->get_count($str)
                                        ?></a></td>
    </tr>
    
<?php
}
?>
</table>

