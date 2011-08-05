<?php 
session_start();
require 'functions.php';
//判断登录
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>控制面板</title>
<script type="text/javascript" src="js/jquery.js"></script>
<?php 
get_uitheme();
get_ui('core');
get_ui('widget');
get_ui('button');

?>
<script type="text/javascript" src="js/panel.js"></script>
<script type="text/javascript" src="js/<?php echo $filename;?>.js"></script>
<link type="text/css" rel="stylesheet" href="css/<?php echo $filename;?>.css" />
<style>
	#dialog{
		font-size:20px;
		color:blue;
		font-family:"微软雅黑", "黑体";
	}
	#dialog img{
		width:50px;
	}
	.value{
		display:none;
	}
</style>
</head>
<body>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.dialog.js"></script>
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
		},
		autoOpen: false
	};
	$("#dialog").dialog(dialogOpt);

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
    <?php
		//导入全站设置
		require_once('../yn-include/Option.php');
		$option=new Option();
	?>
    <input id="back_good_num" class="value" value="<?php echo $option->get_back_belly_num()?>" />
    <input id="back_lookfor_num" class="value" value="<?php echo $option->get_back_lookfor_num();?>" />
<!–[if lte IE 6]>
<style>
*html .panel_button{
		margin-top:-35px;
		margin-right:10px;		
}
*+html .panel_button{
	margin-top:-35px;
		margin-right:10px;	
}
</style>
