<?php
require 'functions.php';
session_start();
is_login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<script type="text/javascript" src="../yn-include/jquery/jquery.js"></script>
<?php 
get_jquery();
get('index');
?>
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

<body style="overflow:hidden;">
<table width="100%">
 <tr>
 	<td><div id="menubar" style="overflow:hidden;">
    <div id="menubar_logo">
      <img src="image/yinong_admin_logo.png" />
    </div><!--end menubar_logo-->
  	 <ul>
       <li name='control_panel'>
       	  <a class="cdx" name="control_panel" id="a_control_panel" href="#">
             <div class="img"></div>控制板
          </a>
       </li>
       <div class="hide_bar" id="bar_control">
       	
       </div>
       <div class="clear"></div>
       <li name='sonny'><a id="a_sonny" name="bar_sonny" href="#"><div class="img"></div>宝贝</a></li>
       <div class="hide_bar" id="bar_sonny">
       	 <ul>
           <li><a class="cdx" name="belly_panel" href="#">宝贝</a></li>
           <li><a href="#" class="cdx" name="addBelly_panel">添加宝贝</a></li>
         </ul><div class="clear"></div>
       </div>
       <div class="clear"></div>
       <li name='lookfor'><a id="a_lookfor" name="lookfor_panel" href="#"><div class="img"></div>求购信息</a></li>
	   <div class="hide_bar" id="bar_lookfor">
       	  <ul>
           <li><a class="cdx" name="lookfor_panel" href="#">自己</a></li>
           <li><a class="cdx" name="lookfor_all_panel" href="#">所有</a></li>
          </ul>
       </div>
       <div class="clear"></div>    
            
       <li name='leave_word'><a id="a_leave_word"  href="#"><div class="img"></div>宝贝留言</a></li>
       <div class="hide_bar" id="bar_leaveword">
        	<ul>
           <li><a class="cdx" name="reply_panel" href="#">宝贝留言</a></li>
           <li><a class="cdx" name="reply_lookfor_panel" href="#">求购留言</a></li>
		   <li><a class="cdx" name="reply_reply_panel" href="#">回复留言</a></li>

          </ul>
       </div>
       <li name='information'><a id="a_information" href="#"><div class="img"></div>资料</a></li>     
       <div class="hide_bar" id="bar_information">
          <ul>
            <li><a class="cdx" name="infor_panel" href="#">我的资料</a></li>
          </ul>
       </div>
     </ul>
  </div><!--menubar-->
  </td>
  <td>
  <?php get_header();?>
  <iframe id="barmid" src="control_panel.php">
  
  </iframe><!--end barmid-->
  <?php get_footer();?>
  </td>
  </tr>
  </table>
  
</body>
<script type="text/javascript">
function getTotalWidth (){             
     if($.browser.msie){
        return document.compatMode == "CSS1Compat"? document.documentElement.clientWidth :
        document.body.clientWidth;
        }else{
         return self.innerWidth;
        }
}  
function getTotalHeight(){
             
            if($.browser.msie){
                return document.compatMode == "CSS1Compat"? document.documentElement.clientHeight :
                         document.body.clientHeight;
            }else{
                return self.innerHeight;
            }
}
$(function(){
	$("#barmid").width(getTotalWidth()-170);
	$("#barmid").height(getTotalHeight()-$("#header").height()-20);
	$("#menubar").height(getTotalHeight()-20);
});

</script>

</html>