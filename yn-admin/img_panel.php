<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];

$filename='belly_panel';
require 'panel_header.php';
require_once '../yn-include/core.php';

$base=new Base();
$comment=new Comment();
?>

<?php
require_once '../yn-include/Base.php';
require_once '../yn-include/Comment.php';
require_once '../yn-include/User.php';
require_once '../yn-include/Good.php';
require_once '../yn-include/Lookfor.php';
require_once '../yn-include/Option.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
$option=new Option();

?>
<link rel="stylesheet" type="text/css" href="../yn-include/jquery/jquery-pager/Pager.css" />
<style>
#pic_table img{
	width:70px;
	border:3px solid #eee;
}
</style>
<div id="zjbelly" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">图片管理</h3>
		<button type="button" id="edit_on">删除</button>
        &nbsp;&nbsp;
        <button type="button" id="delete_all">删除上传原始图片</button>       
  
  <div id="edit_belly_on">
  	
  </div>
  
  <?php
	$pagerid='pager';
	$page_kind='goods';  //取得元素的状态
	$page_status='on';
	$pages_each=(int)($option->get_back_belly_num());
	$table_id='edit_belly_on';
	$core_id='pic_panel';
	require 'core/page_img.php';
  ?>
</div><!--end zjbelly-->

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
?>
<script type="text/javascript" src="../yn-include/jquery/jquery-pager/jquery.pager.js"></script>

<?php	
	require 'panel_footer.php';
   ?>
