<?php 
//$filename='addBelly_panel';
require 'panel_header.php';
?>
<link type="text/css" rel="stylesheet" href="css/editor.css" />
<link type="text/css" rel="stylesheet" href="css/addBelly_panel.css" />
<script type="text/javascript" src="../yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.progressbar.js"></script>
<script type="text/javascript" src="jquery/jquery.select.js"></script>


<div id="add_belly" class="small_panel ui-widget-content ui-corner-all">
  <h3 class="ui-widget-header ui-corner-all">群发邮件</h3>
  <table>
  <tr>
   <td></td>
   <td>
	<input style="display:none" type="text" id="subject" value="Yinong"/>&nbsp;&nbsp;To:&nbsp;
	<select id="the_user_level">
		<option value="0" selected="selected">冻结账户</option>
		<option value="1">普通用户</option>
		<option value="2">编辑</option>
	</select>
	</td></tr>
	<tr>
	<td colspan="2">
      <div id="container" class="ebody"></div>
	 </td>
	 </tr>
	 <tr>
	 <td></td><td>
	<button type="button" id="themail">发送</button>
	</td></tr>
  
</div>
<div id="thedialog" title="运行中...">
	<p>邮件发送中，请等待...</p>
</div>
<script type="text/javascript">
$(function() {
		//按钮初始化
		$('button').button();                //加入图片dialog
});

	var dialog={
		modal:true,
		autoOpen: false
	};
	$("#thedialog").dialog(dialog);

</script>
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
<script type="text/javascript" src="js/editor.js"></script>
<script type="text/javascript" src="js/mail_panel.js"></script>
<script type="text/javascript" src="js/editor_front.js"></script>
<?php

	
	require 'panel_footer.php';
   ?>