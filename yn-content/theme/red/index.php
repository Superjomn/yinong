<?php
require_once'function.php';
$file='index';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>忆农网</title>
<link rel="stylesheet" type="text/css" href="yn-include/theme/red/css/index.css" />
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>

<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<!--图片展示开始-->
<link type="text/css" rel="stylesheet" href="yn-include/theme/red/css/img_roll.css" />
<script type="text/javascript" src="yn-include/theme/red/js/img_roll.js"> </script> 

<link type="text/css" rel="stylesheet" href="yn-include/theme/red/css/index.css" />
</head>

<!--开始网页脚-->
<style>

.li_on{
	background-color:#f0858d;
}
.li_spe{
	background-color:#eee;
}

</style>
<style>
.clear{
	clear:both;
	height:0;
}


.scroll_bar li{
	display:block;
	padding-bottom:-10px;
	cursor:pointer;
}
.scroll_bar table{
	cursor:pointer;
}
#scroll_bar a{
	display:block;
	padding-bottom:4px;
}
*+html #scroll_bar a{
	padding:0;
}
.scroll_bar img{
	height:70px;
	width:100px;
	border:2px solid #ccc;
	margin-right:5px;
	float:left;
}
.scroll_bar h4{
	font-size:16px;
}
.scroll_bar b{
	font-weight:normal;
	font-size:15px;
	font-family:"微软雅黑", "黑体";
}
.scroll_bar .author{
	color:#999;
	float:right;
}
.scroll_bar .more{
	float:right;
}
.scroll_bar table{
	padding:0;
}
.scroll_bar td{
	padding:0;
	margin:0;
}
.li_div li{
padding:6px;
font-family:"微软雅黑","宋体";
font-weight:normal;
text-align:left;
}
/*图片展示开始*/
.main_image h2{
font-size:20px;
font-weight:normal;
}
.image_thumb h2{
font-size:20px;
font-weight:normal;
}
.scroll_bar li{
text-align:left;
}
</style>

<body>

   <div id="wrapper">   
   
      <?php require'header.php';?>
      <?php require'scroll_adv.php';?>   
      

      <div id="content">
	   	 <div id="main" class="container"> 
		 <?php
		 	$good->get("select * from goods where status='on'",0,4);
          	 $good->get_good('goods', 1);
		 ?>
			<div class="main_image"> 
				<img src="<?php $good->get_leftimg();?>" alt="- banner1" /> 
				<div class="desc"> 
			<a href="#" class="collapse">关闭</a> 
			<div class="block"> 
				<h2 style="font-size:20px; font-weight:normal;"><?php $good->get_name();?></h2> 
				<small><?php $good->get_date();?></small>
				
				<p><?php $good->get_excerpt(26);?><br /><a href="good?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good" target="_blank">查看</a> </p>
			</div> 
		</div> 
	</div> 
	<div class="image_thumb"> 
		<ul> 
			<?php
				index_roll_img($good,5);
			?>
			
		</ul> 
	</div> 
	<div class="clear"></div>
	<table>
		<tr>
		  <td valign="top">
		  	<div class="ui-widget-content ui-corner-all">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=fcg">学友火炬</a></h3> 
		  	<ul class="scroll_bar">
				<?php index_good_list($good,'学友火炬',6) ?>
			</ul>
			</div>
		  </td>
		  <td valign="top">
		  	<div class="ui-widget-content ui-corner-all">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=fcg">以物易物</a></h3> 
		  	<ul class="scroll_bar">
				<?php index_good_list($good,'以物易物',6) ?>
			</ul>
			</div>
		  </td>
		  <td valign="top">
		  	<div class="ui-widget-content ui-corner-all">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=fcg">跳蚤市场</a></h3> 
		  	<ul class="scroll_bar">
				<?php index_good_list($good,'跳蚤市场',6) ?>
			</ul>
			</div>
		  </td>
		</tr>
		<tr>
			<td valign="top">
				<div class="ui-widget-content ui-corner-all li_div">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=fcg">校园公告</a></h3> 
		  	<ul class="scroll_bar">
				<?php index_wp_dongtai(6) ?>
			</ul>
				</div>
			</td>
			<td valign="top">
				<div class="ui-widget-content ui-corner-all li_div">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="lookfor_list.php?page_index=lookfor_list">求购信息</a></h3> 
		  	<ul class="scroll_bar">
				<?php index_lookfor_list($lookfor,6); ?>
			</ul>
				</div>
			</td>
			<td valign="top">
				<div class="ui-widget-content ui-corner-all li_div">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=fcg">易农动态</a></h3> 
		  	<ul class="scroll_bar">
				<?php index_wp_gonggao(6) ?>
			</ul>
			</div>
			</td>
		</tr>
	</table>
</div>  

	   
      </div>
	  
   <?php require 'footer.php';?>      
  </div><!--end wrapper-->
<script type="text/javascript">
	$("#content li:even").addClass('li_spe');	
	$("#content li").mouseover(function(){
	    $(this).removeClass('li_spe').addClass('li_on');
	});
	$("#content li").mouseout(function(){
		$(this).removeClass('li_on');
		$("#content li:even").addClass('li_spe');
	});
</script>


</body>


</html>