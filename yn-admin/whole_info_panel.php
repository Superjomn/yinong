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
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
?>
<?php require 'panel_header.php';?>
    <div id="summarize" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">宝贝数据</h3>
        <table>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods");  ?></td>
            <td>宝贝</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where status='complete'"); ?></td>
           	<td>成交</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where status='draft'"); ?></td>
            <td>草稿箱</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from comment where fromid=$user_id and fromname='chunwei'");  ?></td>
          	<td>管理员留言</td>
          </tr>
        </table>
        <table>
          <tr>
            <td><?php echo $base->get_count("select count(*) from comment");  ?></td>
          	<td>留言</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where status='on'");  ?></td>
          	<td>获准</td>
          </tr>
          <tr>
            <td><?php echo $base->get_count("select count(*) from goods where status='hold'");  ?></td>
          	<td>待审</td>
          </tr>
          <tr>
            <td><?php echo $base->get_count("select count(*) from goods where status='back'");  ?></td>
            <td>驳回</td>
          </tr>
        </table><div class="clear"></div>
     </div><!--end reply-->
         <div id="summarize" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">平台数据</h3>
        <table>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods");  ?></td>
            <td>总访问量</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where status='complete'"); ?></td>
           	<td>今日访问量</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from user"); ?></td>
            <td>用户数</td>
          </tr>
          
        </table>
        <table>
          <tr>
            <td><?php echo $base->get_count("select count(*) from user where level=0");  ?></td>
          	<td>冻结用户</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from user where level=1");  ?></td>
          	<td>普通用户</td>
          </tr>
          <tr>
            <td><?php echo $base->get_count("select count(*) from user where level=2");  ?></td>
          	<td>编辑</td>
          </tr>
          
        </table><div class="clear"></div>
     </div><!--end reply-->
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
    