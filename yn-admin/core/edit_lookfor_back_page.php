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
$num=$base->get_count("select count(*) from lookfor where status='back'");
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
    <table><tr class="label"><td>选项</td><td>名称</td><td>创建日期</td><td>操作</td></tr>
      <?php
	   $lookfor->get_good_all_lookfor('back',$pages_each*($page_cur-1),$pages_each);
        for($i=0;$i<$page_last;$i++){
          $lookfor->get_lookfor('lookfors', $i);
      ?>
      <tr>
      <td align="left"><input type="checkbox" name="complete_check" value="<?php echo $lookfor->get_id(); ?>" /></td>
	  	  <?php //echo $lookfor->get_id();?>
          <td><a href="../lookfor?id=<?php echo $lookfor->get_id(); ?>"><?php echo $lookfor->get_name();  ?></a></td>
          <td><?php $lookfor->get_date(); ?></td>
          <td><button type="button" class="delete" name="<?php echo $lookfor->get_id(); ?>" kind='lookfor'>删除</button>
          &nbsp;
          <button class="a" hr="../lookfor?id=<?php echo $lookfor->get_id(); ?>" type="button">查看</button>
          &nbsp;
          <button class="huifu" name="<?php echo $lookfor->get_id(); ?>" type="button">恢复</button>
          </td>
        
      </tr>    
<?php
   }
?>
</table>