<?php
require 'functions.php';
session_start();
if(!$_SESSION['onload'])
	header('location:../denglu');

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

@charset "utf-8";
@import 'common.css';
#header{
	height:50px;
	text-align:50px;
	width:100%;
	background-color:#e6e6e6;
}
#header b{
	font-size:30px;
	font-weight:normal;
}
#header a{
	color:#000;
}
#header a:hover{
	color:#999;
}
#header #login{
	float:right;
	margin:5px;
}
#menubar,iframe#barmid{
	height:800px;
	float:left;
}
#menubar{
	width:150px;
	height:900px;
	background:url(../image/menu-item-bg.png) repeat-y;
	color:#fff;
	font-size:15px;
}
#menubar .li{
	display:block;
	height:35px;
}
#menubar .li a{
	color:#fff;
	text-decoration:none;
	display:block;
	height:30px;
	line-height:30px;
}
#menubar .li a .img{
	height:30px;
	width:30px;
	float:left;
	background-image:url(../image/menu.png);
	
}
/*控制板*/
#a_control_panel .img{
	background-position:-63px 31px;
}
#a_control_panel:hover .img{
	background-position:-63px 0px;
}
/*宝贝*/
#a_sonny .img{
	background-position:-2px 31px;
}
#a_sonny:hover .img{
	background-position:-2px 0px;
}
/*求购信息*/
#a_lookfor .img{
	background-position:-153px 31px;
}
#a_lookfor:hover .img{
	background-position:-153px 0px;
}
/*留言*/
#a_leave_word .img{
	background-position:-33px 31px;
}
#a_leave_word:hover .img{
	background-position:-33px 0px;
}
/*图片*/
#a_pic .img{
	background-position:-123px 31px;
}
#a_pic:hover .img{
	background-position:-123px 0px;
}

/*资料*/
#a_information .img{
	background-position:-303px 31px;
}
#a_information:hover .img{
	background-position:-303px 0px;
}
/*设置*/
#a_set .img{
	background-position:-213px 31px;
}
#a_set:hover .img{
	background-position:-213px 0px;
}


#menubar .hide_bar{
	text-align:center;
	display:none;
}
#menubar .hide_bar a{
	display:block;
	width:90%;
}
#menubar .hide_bar a:hover{
	background-color:#000;
}
iframe#barmid{
	width:1109px;
}
	
</style>


</head>

<body style="overflow:hidden;">
  <div id="menubar" style="overflow:hidden;">
    <div id="menubar_logo">
      <img src="image/yinong_admin_logo.png" />
    </div><!--end menubar_logo-->
  	 <ul>
       <div class='li' name='control_panel'>
       	  <a class="cdx" name="control_panel" id="a_control_panel" href="#">
             <div class="img"></div>控制板
          </a>
       </div>
       <div class="hide_bar" id="bar_control">
       	
       </div>
       <div class="clear"></div>
       <div class='li' name='sonny'><a id="a_sonny" name="bar_sonny" href="#"><div class="img"></div>宝贝</a></div>
       <div class="hide_bar" id="bar_sonny">
       	 <ul>
           <div class='li'><a class="cdx" name="belly_panel" href="#">宝贝</a></div>
           <div class='li'><a href="#" class="cdx" name="addBelly_panel">添加宝贝</a></div>
         </ul><div class="clear"></div>
       </div>
       <div class="clear"></div>
       <div class='li' name='lookfor'><a id="a_lookfor" name="lookfor_panel" href="#"><div class="img"></div>求购信息</a></div>
	   <div class="hide_bar" id="bar_lookfor">
       	  <ul>
           <div class='li'><a class="cdx" name="lookfor_panel" href="#">自己</a></div>
           <div class='li'><a class="cdx" name="lookfor_all_panel" href="#">所有</a></div>
          </ul>
       </div>
       <div class="clear"></div>    
            
       <div class='li' name='leave_word'><a id="a_leave_word" class="cdx" name="reply_panel" href="#"><div class="img"></div>留言</a></div>
       <div class="hide_bar" id="bar_leaveword">
        
       </div>
       <div class='li' name='information'><a id="a_information" href="#"><div class="img"></div>资料</a></div>     
       <div class="hide_bar" id="bar_information">
          <ul>
            <div class='li'><a class="cdx" name="infor_panel" href="#">我的资料</a></div>
          </ul>
       </div>
     </ul>
  </div><!--menubar-->
  <?php get_header();?>
  <iframe id="barmid" src="control_panel.php">
  
  </iframe><!--end barmid-->
  <?php get_footer();?>
  
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
	$("#barmid").width(getTotalWidth()-200);
	$("#barmid").height(getTotalHeight()-$("#header").height()-20);
	$("#menubar").height(getTotalHeight()-20);
});
</script>

</html>