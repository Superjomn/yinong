<?php require 'functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>控制面板</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.slider.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.dialog.js"></script>
<style>
	#dialog{
		font-size:20px;
		color:blue;
		font-family:"微软雅黑", "黑体";
	}
	#dialog img{
		width:50px;
	}
</style>
<link type="text/css" rel="stylesheet" href="css/editor.css" />

</head>
<body>

<div id="dialog">
	<img src="image/logo.gif" />
    操作已经完成！
</div>
<script type="text/javascript">
	var dook=function(){
		$("#dialog").dialog('close');
		//自动进行刷新
		 window.location.reload();
	}
	var dialogOpt={
		modal:true,
		buttons:{
			"确定":dook
		}
	};
	$("#dialog").dialog(dialogOpt).dialog('close');
	function dlg(text){
		$("#dialog").text(text).dialog('open');
	}
</script>
<!--dialog 结束-->
  <div id="panel" class="ui-widget-content ui-corner-all">  	
	<h3 id="panel_h3">
    	<div class="img">
    	</div> 
           控制面板
        <a href="#" id="help" class="panel_button" style="color:#fff;">
            帮助
        </a>
        <a href="#" id="infor" class="panel_button" style="color:#fff;">
            信息
        </a>
    </h3> 
    <div id="hide_panel" class="ui-widget-content ui-corner-all">
    
    </div>

<div id="add_belly" class="small_panel ui-widget-content ui-corner-all">
  <h3 class="ui-widget-header ui-corner-all">发布宝贝</h3>
  <table>
      <tr>
          <td class="label">宝贝名称</td>
          <td colspan="4">
              <input name="name" type="text"/>
          </td>
      </tr>
    <tr>
      <td class="label">上传图片</td>
    <td>
      <button type="button" id="left_bn">左视图</button>
    </td>
    <td>
        <button type="button" id="fron_bn">前视图</button>
    </td>
    <td>
        <button type="button" id="top_bn">正面</button>
    </td>
    <td>
        <button type="button" id="back_bn">背面</button>
    </td>
    </tr>
  <!--展示图片区-->
  <tr id="img_show"><td></td>
      <td id="img_left_show">
     </td>
     <td id="img_fron_show">
     </td>
     <td id="img_top_show">
     </td>
     <td id="img_back_show">
     </td>
   </tr>
   <tr>
       <td class="label">描述</td>
       <td colspan="4">
           <div id="container" class="ebody"></div> 
           <script type="text/javascript" src="js/editor_front.js"></script>
       </td>
   </tr>
   <tr>
     <td class="label">类别</td>
     <td colspan="4">
         <select name="sort">
           <option value="图书资料" selected>图书资料</option>
           <option value="文具用品">文具用品</option>
           <option value="电脑配件">电脑配件</option>
           <option value="电子产品">电子产品</option>
           <option value="体育娱乐">体育娱乐</option>
           <option value="生活/女生专区">生活/女生专区</option>
       </select>
     </td>     
   </tr>
   <tr>
     <td class="label">标签</td>
     <td colspan="4">
         <input type="text" name="tag" />
     </td>
   </tr>
   <tr>
     <td class="label">新旧</td>
     <td colspan="4">
       <input type="text" id="amount" style="border:0; font-size:17px; color:#f6931f; font-weight:bold;" /> 
       <div id="slider-range-max" class="green"></div>
     </td>
   </tr>
   <tr>
   	  <td class="label">发布地点</td>
      <td colspan="4">
         <select name="sendto" onchange="make(options.selectedIndex);">
             <option value="">-选择-</option>
              <option value="学友火炬" id="sendto_1">学友火炬</option>
              <option value="以物易物" id="sendto_2">以物易物</option>
              <option value="跳蚤市场" id="sendto_3">跳蚤市场</option>
        </select>
      </td>
   </tr>
   <tr style="display:none;" id="hide_1">
       <td class="label">交换物品</td><td colspan="4"><input type="text" name="exchangefor"/></td>
   </tr>
   <tr style="display:none;" id="hide_2">
       <td class="label">描述</td><td colspan="4"><textarea name="miaoshu"></textarea></td></tr>
   <tr style="display:none;"id="hide_3">
       <td class="label">定价</td><td colspan="4"><input type="text" name="price"/></td>
   </tr>
   <tr>
     <td>
     </td>
     <td colspan="4">
         <button type="button" id="draft">保存草稿</button>&nbsp;&nbsp;
         <button type="button" id="drop">舍弃</button>
       <button type="button" id="submit" style="float:right; margin-right:100px;">发布</button>
     </td>
   </tr>
  </table>
    
  
    

</div>
<div style="clear:both; height:0; width:100%;"></div>
<div id="image_select" title="加入图片">

    <iframe id="pic_select" src="image_se.php?kind=left">
    </iframe>
    <input class="value" id="img"/>
    <button type="button" id="bn_submit" name="上边">确认</button>&nbsp;&nbsp;
    <button type="button" id="bn_false">取消</button>
</div>
<div id="thetry" title="thetry">
	<p>yes it works</p>
</div>
<script type="text/javascript">
$(function(){
	$("#thetry").dialog();
		   });
</script>
<div id="try"></div>



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
<script type="text/javascript" src="js/panel.js"></script>
<script type="text/javascript" src="js/addBelly_panel.js"></script>


<?php
	require 'panel_footer.php';
   ?>