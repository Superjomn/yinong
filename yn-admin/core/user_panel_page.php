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
$num=$base->get_count("select count(*) from goods where status='draft'");
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
<tr class="table_topper"><td>选择</td><td>用户名</td><td>操作</td><td>真实姓名</td><td>等级</td></tr>
     <?php
	 function g_level($user,$value){
			if( ($user->get_level())==$value)
				echo " selected='selected'";
	}
     $user=new User();
	   $user->get_users($pages_each*($page_cur-1), $pages_each);
           for($i=0;$i<$user->get_count();$i++){
             $user->get_each_user($i);
      ?>
    <tr>
        <td><input type="checkbox" name="complete_check" value="<?php echo $user->get_id(); ?>" /></td>
        <td><a href="infor_panel?kind=superadmin&id=<?php echo $user->get_id(); ?>"><?php echo $user->get_name(); ?></a></td>
      <td style="width: 30%;"><button class="a" hr="infor_panel?kind=superadmin&id=<?php echo $user->get_id(); ?>" type="button">查看</button>&nbsp;<button type="button">编辑</button>&nbsp;
      <button type="button" class="dongjie" name="<?php echo $user->get_id(); ?>">冻结</button></td>
      <td><?php $user->get_realname(); ?></td>
      <?php
	  	
        
      ?>
      <td class="reply_num">
      	<select id="se<?php echo $user->get_id();?>">
        	<option value="0"<?php g_level($user,0) ?>>冻结</option>
      		<option value="1"<?php g_level($user,1) ?>>发布者</option>
            <option value="2"<?php g_level($user,2) ?>>编辑</option>
            <option value="3"<?php g_level($user,3) ?>>管理员</option>
      </select>&nbsp;
      <button type="button" name="<?php echo $user->get_id();?>" se="se<?php echo $user->get_id();?>" class="level">权限修改</button>
      </td>
    </tr>
    
<?php
}
?>

