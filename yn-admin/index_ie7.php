<?php
require 'functions.php';
session_start();
if(!($_SESSION['onload']===true))
	header('location:../denglu');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link type="text/css" rel="stylesheet" href="jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<link type="text/css" rel="stylesheet" href="css/index_ie7.css" />
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<script type="text/ecmascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.accordion.js"></script>
<script type="text/javascript" src="js/index_ie7.js"></script>

<script type="text/javascript">
$(function(){
	if($.browser.msie){
            //alert($.browser.version);            
        $("#menu").accordion({
		animated:false
	});
           
    }else{
		$("#menu").accordion();
	}
		   
});

</script>


<style>
.clear{
	clear:both;
	height:0;
	width:%100;
}
*{
	z-index:0;
}
li{
	display:block;
}
</style>
</head>

<body>
<table width="100%">
<tr>
<td valign="top"  width="150">
<div id="menubar">
	<div id="menubar_logo">
      <img src="image/yinong_admin_logo.png" />
    </div><!--end menubar_logo-->
    <div id="menu">
	<h3 name='control_panel'><a id="a_control_panel" href="#"><div class="img"></div>控制板</a></h3>
	
	<div>
		<a href="#" class="cdx" name="control_panel">我的综述</a><br />
	</div>
	<h3><a id="a_sonny" name="bar_sonny" href="#"><div class="img"></div>宝贝</a></h3>
	<div>
		<a class="cdx" name="belly_panel" href="#">宝贝</a><br />
        <a href="#" class="cdx" name="addBelly_panel">添加宝贝</a><br />
        <!--编辑专用-->
	</div>
	<h3><a id="a_lookfor" name="lookfor_panel" href="#"><div class="img"></div>求购信息</a></h3>
	<div>
		   <a class="cdx" name="lookfor_panel" href="#">自己</a><br/>
           <a class="cdx" name="lookfor_all_panel" href="#">所有</a><br/>
	</div>
    <h3><a id="a_leave_word"  href="#"><div class="img"></div>留言</a></h3>
    <div>
    	<a href="#" class="cdx" name="reply_panel">我的留言</a>
    </div>
	<h3><a id="a_information" href="#"><div class="img"></div>资料</a></h3>
	<div>
		<a class="cdx" name="infor_panel" href="#">我的资料</a>
	</div>
</div><!--end menu-->
</div><!--end menubar-->
</td><td valign="top" align="left">
<?php get_header();?>
  <iframe id="barmid" src="control_panel.php" style="width:100%">
  
  </iframe><!--end barmid-->
<?php get_footer();?>
<script type="text/javascript">
	
</script>

</td></tr></table>

</body>

</html>