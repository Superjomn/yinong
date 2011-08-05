<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
?>
<?php $filename='control_panel';?>
<?php
require_once '../yn-include/Base.php';
require_once '../yn-include/Comment.php';
require_once '../yn-include/User.php';
require_once '../yn-include/Good.php';
require_once '../yn-include/Lookfor.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
?>
<?php $filename='infor_panel';?>
<?php require 'panel_header.php';
$kind=$_GET['kind'];
if($kind=='superadmin'){
	$user_id=$_GET['id'];
}
?>
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
    <?php
        $user->set_id($user_id);
        $user->get_user();
    ?>
	<h3 class="ui-widget-header ui-corner-all">用户信息</h3>
    <table>
        <tr><td>用户名</td><td><input name="user_name" user_id="<?php echo $user->get_id();?>" type="text" disabled value="<?php $user->get_name();  ?>" class="text ui-widget-content ui-corner-all"/>
                <span id="user_name">用户名无法更改</span></td></tr>
        <tr><td>真实姓名</td><td><input type="text" name="real_name" value="<?php $user->get_realname(); ?>"  class="text ui-widget-content ui-corner-all"/>
          <span id="real_name"></span></td></tr>
        <tr><td>性别</td><td><select name="sex">
                    <option value="男" selected>男</option>
                    <option value="女">女</option>
                </select></td></tr>
        <tr><td>学号</td><td><input type="text" name="study_num" value="<?php $user->get_studynum(); ?>"  class="text ui-widget-content ui-corner-all"/>
          <span id="study_num"></span></td></tr>
        <tr><td>学院</td><td><input type="text" value="<?php $user->get_xueyuan(); ?>"  name="xueyuan" class="text ui-widget-content ui-corner-all"/>
            <span id="xueyuan">全称</span></td></tr>
        <tr>
            <td>校区</td><td><select name="xiaoqu">
                    <option value="东校区" selected>东校区</option>
                    <option value="西校区">西校区</option>
                </select></td>
        </tr>
        <tr><td>联系方式</td><td><input type="text" name="connect" value="<?php $user->get_connect(); ?>" class="text ui-widget-content ui-corner-all"/>
          <span id="connect">便于买家联系</span></td></tr>
        <tr><td>生日</td><td><input type="text" name="birthday" value="<?php $user->get_birthday();  ?>"  class="text ui-widget-content ui-corner-all"/>
          <span id="birthday"></span></td></tr>
        <tr><td>邮箱</td><td><input type="text" name="email" value="<?php $user->get_email();  ?>" class="text ui-widget-content ui-corner-all"/>
          <span id="email"></span></td></tr>
        <tr><td>关于自己</td><td><textarea name="about_me"  class="text ui-widget-content ui-corner-all"><?php $user->get_aboutme();  ?></textarea>
          <span id="about_me"></span></td></tr>
        <tr><td>新密码</td><td><input type="password" value="<?php echo $user->get_pwd(); ?>" name="new_pwd"  class="text ui-widget-content ui-corner-all"/>
          <span id="new_pwd">如果你不想更换密码，请不要改动此栏</span></td></tr>
        <tr><td></td><td><input type="password" name="re_pwd" value="<?php echo $user->get_pwd();  ?>"  class="text ui-widget-content ui-corner-all"/>
          <span id="re_pwd"></span></td></tr>
      
      <tr><td></td><td><button id="edit_save" type="button">确认</button>&nbsp;&nbsp;<button type="button">重置</button></td></tr>
    </table>
    
</div>

<div id="core"></div>

<?php
$help_content=<<<EOD
	 欢迎使用帮助选项：<br />
    您现在的角色是 发布者，拥有发布物品、求购信息及处理他人留言的权限。<br /><br />
    控制板主要包括：<br /><br />
  <ul>
     <li><strong>概况</strong>--包括自己宝贝的数量及留言数等信息，点击链接，您可以直接转到相应板块查看。</li><br />    
     <li><strong>最新留言</strong>--方便其他用户与您的交流。 您可以直接回复他们。</li><br />     
     <li><strong>快速发布</strong>--发布您的求购信息，这些信息将加入数据库中，他人可以查询，并且与您联系。</li><br />
      <li>&nbsp;&nbsp;&nbsp;   您可以保存到草稿箱，也可以直接发布。</li><br />
  </ul>
<br />
    <p>
       所有发布信息，责任均由发布者本人承担。网站管理员有责任也有权力驳回发布者不合适的发布信息及求购信息。
    </p>
EOD;
	
	require 'panel_footer.php';
   ?>