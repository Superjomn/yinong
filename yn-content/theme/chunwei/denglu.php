<?php
	session_start();
	require 'yn-register.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<title>登陆</title>
<script type="text/javascript">
$(function(){
	$('button').button();		   
		   
});
</script>
</head>

<style>
#outer{
	margin:150px auto 0 auto;
        padding: 0;
        width: 394px;
}
#login{
	font-size:20px;
	font-family:"微软雅黑", "黑体";
	width:355px;
	padding:20px;
	padding-left:40px;
}

#login input{
	font-size:25px;
	padding:3px;
	margin-top:5px;
}
#alert{
	font-size:16px;
	padding:10px;
	display:none;
	border:3px solid #F93;
	width:300px;
}
.label{
	font-size:16px;
	color:#999;
}
/*login的背景*/
#login_header{
	height:20px;
	background:url(yn-include/image/login_header_bg.png) no-repeat left top;
}
#login_body{
	background:url(yn-include/image/login_body_bg.png) repeat-y left top;
}
#login_bottom{
	height:40px;
	background:url(yn-include/image/login_botton_bg.png) no-repeat left top;
}
</style>
<script type="text/javascript">
$(function(){
   //alert($("#login").width());
   //alert($("#login").height());
});
</script>

<body>
 <div id='outer'>
  <div id="login_header"></div>
  <div id="login_body">
  <div id="login"> 
     
     <div id="logo"><a href="index">
       	<img src="yn-include/image/logo.gif"  width="76" style="margin-left:-14px;"/>
        <img src="yn-include/image/text.gif"  style=" margin-bottom:10px;"/></a>
     </div><!--end logo-->
     <div id="alert"></div>
     <form id="theform">
         <input value="onload" id="kind" style="display:none;"/>
     <table>
    	<tr id="name_tr">
            
        	<td><span class="label">用户名</span><br />
            <input type="text" name="name" /></td>
        </tr>
        <tr id="pwd_tr">
        	<td><span class="label">密码</span><br />
            <input type="password" name="pwd" /></td>
        </tr>
        <tr id="email_tr" style="display:none;">
        	<td><span class="label">邮箱地址</span><br />
            <input type="text" name="email" /></td>
        </tr>
        <tr>
            <td><button type="button" id="bn_submit">确定</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset">重置</button></td>
        </tr>
        <tr>
        	<td><a id="denglu" href="register.php">注册</a>|<a href="#" id="forget_pwd">忘记密码</a>|<a href="index">首页</a></td>
        </tr>
     </table>
     </form>
       
  </div><!--end login-->
    </div><!--end login_body--><div style="clear:both; height:0;"></div>
  <div id="login_bottom"></div>	
</div><!--end outer-->  
  
  
<script type="text/javascript">
	$(function(){
		$("#forget_pwd").click(function(){
			$("#alert").html('请输入您的注册邮箱，我们将通过邮件，将密码发送给您。');
			$("#alert").slideDown(500);
			$("#name_tr").hide();
			$("#pwd_tr").hide();
			$("#email_tr").show();
            $("#kind").val('forget_pwd');
			$("#bn_submit").click(function(){
				window.location.href="index";
			});
			//修改登陆 链接
			$("#denglu").text('登陆').attr('src','denglu.php');
		});
                
	});
        $(function(){
            //开始登陆
            $("#bn_submit").click(function(){
                if($("#kind").val()=='onload'){
                 $.post("yn-include/onload.php", {
                    name:$("[name=name]").val(),
                    pwd:$("[name=pwd]").val()
                   },function(data,textStatus){
                       //alert(data);
					   //alert(data);
					   //浏览器判断
                      if(data>0){
                          //成功登陆
						  //alert(data);
						  if($.browser.msie) { 
						    if(data==1)
							   window.location.href="yn-admin/index_ie7";
							else if(data==2)
							   window.location.href="yn-admin/edit_admin_ie7";
							else if(data==3)
							   window.location.href="yn-admin/super_admin_ie7";
					      }					 
						else 
						{ 
						//alert('ff');
					   if(data==1)
							   window.location.href="yn-admin/index.php";
							else if(data==2)
							   window.location.href="yn-admin/edit_admin.php";
							else if(data==3)
							   location.replace('yn-admin/super_admin.php');
					   } 
                         
                      }else{
						  $("[name=pwd]").css('border-color','red');
					  }
                    });//end post
             }//end if
            });
        });//end start
	</script>

</body>
</html>