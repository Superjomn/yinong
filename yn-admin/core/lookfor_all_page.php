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
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
$base=new Base();
$option=new Option();
//驳回和删除的权限只有编辑及以上才有
$user->set_id($user_id);
$user->get_user();
//计算出总页数
//lookfor总数量
$num=$base->get_count("select count(*) from lookfor where status='on'");
//每页数目
$pages_each=(int)($option->get_back_lookfor_num());
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
      <tr class="label"><td>名称</td><td>创建日期</td><td>操作</td><td>回复数</td></tr>
      <?php
	   $lookfor->get_good_all_lookfor('on',$pages_each*($page_cur-1),$pages_each);
        for($i=0;$i<$page_last;$i++){
          $lookfor->get_lookfor('lookfors', $i);
      ?>
      <tr><?php //echo $lookfor->get_id();?>
          <td><a href="../lookfor?id=<?php echo $lookfor->get_id(); ?>"><?php echo $lookfor->get_name();?></a></td>
          <td><?php $lookfor->get_date(); ?></td>
          <td>
          	<button type="button" class="a" hr="../lookfor?id=<?php echo $lookfor->get_id(); ?>">查看</button>
                <?php
                    if($user->get_level()>1){
                 ?>
                <button type='button' class="delete" name="<?php echo $lookfor->get_id(); ?>">删除</button>
                        &nbsp
                <button type='button' class='bohui' name="<?php echo $lookfor->get_id(); ?>">驳回</button>
               <?php
                    }
                ?>
          </td>
        <td class="reply_num"><?php
             $id=$lookfor->get_id();
             echo $comment->get_comment_num($id,'lookfor')
            ?></td>
      </tr>
    <?php
	}
	?>
</table>

