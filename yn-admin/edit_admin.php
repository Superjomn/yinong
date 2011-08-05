<?php
require 'functions.php';
session_start();
is_login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑后台</title>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<?php 
get_jquery();
get('index');
?>


</head>

<body>
<table width="100%">
	<tr>
	<td>
  <div id="menubar">
    <div id="menubar_logo">
      <img src="image/yinong_admin_logo.png" />
    </div><!--end menubar_logo-->
  	 <ul>
       <li name='control_panel'>
       	  <a name="control_panel" id="a_control_panel" href="#">
             <div class="img"></div>控制板
          </a>
       </li>
       <div class="hide_bar" id="bar_control">
       	 <ul>
         <li><a href="#" class="cdx" name="control_panel">我的综述</a></li>
         <li><a href="#" class="cdx" name="whole_info_panel">全站参数</a></li>
         <li><a href="#" class="cdx" name="liuliang_panel">流量分析</a></li>
		 <li><a href="#" class="cdx" name="mail_panel">邮件群发</a></li>
         </ul>
       </div>
       <li name='sonny'><a id="a_sonny" name="bar_sonny" href="#"><div class="img"></div>宝贝</a></li>
       <div class="hide_bar" id="bar_sonny">
       	 <ul>
           <li><a class="cdx" name="belly_panel" href="#">宝贝</a></li>
           <li><a href="#" class="cdx" name="addBelly_panel">添加宝贝</a></li>
           <!--编辑专用-->
           <li><a href="#" class="cdx" name="edit_belly_on">在架宝贝</a></li>
           <li><a href="#" class="cdx" name="edit_belly_back">已驳回</a></li>
           <li><a href="#" class="cdx" name="edit_belly_hold">重审申请</a></li>
           <li><a href="#" class="cdx" name="edit_belly_draft">草稿箱</a></li>
           
         </ul>
       </div>
       <li name='lookfor'><a id="a_lookfor" name="lookfor_panel" href="#"><div class="img"></div>求购信息</a></li>
	   <div class="hide_bar" id="bar_lookfor">
       	  <ul>
           <li><a class="cdx" name="lookfor_panel" href="#">自己</a></li>
           <li><a class="cdx" name="lookfor_all_panel" href="#">已登出</a></li>
           <li><a href="#" class="cdx" name="edit_lookfor_back">已驳回</a></li>
           <li><a href="#" class="cdx" name="edit_lookfor_draft">草稿箱</a></li>
           <li><a href="#" class="cdx" name="edit_lookfor_hold">重审申请</a></li>
          </ul>
       </div>
       <li name='pic'><a id="a_lookfor" class="cdx" name="img_panel" href="#"><div class="img"></div>图片管理</a></li>    
       <li name='leave_word'><a id="a_leave_word"  name="reply_panel" href="#"><div class="img"></div>留言</a></li>
       <div class="hide_bar" id="bar_leaveword">        	
          	 <li><a href="#" class="cdx" name="reply_lookfor_panel">求购留言</a>         </li>
			 
          	 <li><a href="#" class="cdx" name="reply_reply_panel">留言回复</a>         </li>
          	 <li><a href="#" class="cdx" name="all_comment_panel">全站留言</a>         </li>
            
       </div>
       <li name='information'><a id="a_information" href="#"><div class="img"></div>资料</a></li>     
       <div class="hide_bar" id="bar_information">
          <ul>
            <li><a class="cdx" name="infor_panel" href="#">我的资料</a></li>
          </ul>
       </div>
     </ul>
  </div><!--menubar-->
 </td><td>
  <?php get_header();?>
  <iframe id="barmid" src="control_panel.php" style="width:87%;">
  
  </iframe><!--end barmid-->
  <?php get_footer();?>
</td></tr>
</table>
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
  
</body>
</html>