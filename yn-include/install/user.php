<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户配置</title>
<link type="text/css" rel="stylesheet" href="../jquery/jquery-ui/development-bundle/themes/redmond/jquery.ui.all.css" />

<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<style>
	body{
		background-color:#eee;
	}
	#content{
		margin-left:auto;
		margin-right:auto;
		width:800px;
		border:1px solid #999;
		background-color:#fff;
		padding:20px 45px;
		padding-bottom:60px;
		font-family:"微软雅黑", "黑体";
	}
	#content table{
		margin-left:auto;
		margin-right:auto;
	}
	#content h3{
		display:block;
		width:100px;
		text-align:center;
		margin-left:auto;
		margin-right:auto;
		font-size:30px;
		font-family:"Courier New", Courier, monospace;
	}
	#content .label{
		font-weight:bold;
		width:6em;
	}
	#content td{
		padding:10px;
		background-color:#eee;
	}
	#content input{
		font-size:19px;
	}
	#content button{
		margin-top:20px;
		margin-left:5px;
	}
	
		
</style>
</head>

<body>
<div id="content">
	<h3><img src="../../yn-admin/image/logo.gif" />Yinong</h3>
	<form id="user">
	<table>
    	<tr>
        	<td class="label">用户名</td>
            <td><input type="text" id="user_name" /></td><td>你想要创建的管理员名称</td>
        </tr>
        <tr>
        	<td class="label">密码</td>
            <td><input id="pwd" type="text" />
        </td><td>管理员密码</td>
        <tr>
        	<td class="label">重复输入</td>
            <td><input type="text" />
         </td><td></td>
       </tr>
       <tr><td class="label"></td>
       <td><button type="button" id="submit">提交</button>
       &nbsp;<button type="reset">重置</button>
       </td><td></td>
       </tr>
    </table>
</form>
<script type="text/javascript">
function v(id){
		return $(id).val();
	}
	$(function(){
	    $("#submit").click(function(){
			$.post('install_user.php',{
				   		user:v('#user_name'),
						pwd:v('#pwd'),
						kind:2
				   },function(data,textStatus){
				   		alert(data);
					   if(data=='ok')
					   {
					   		window.location.href='../../denglu';
					   }
					   else
					   	{
							
						}
					   		//alert('can not add the admin\nplease try again\nor connect the author Chunwei superjom@gmail.com');
				   });
		});
			   
	});
</script>
</div>



</body>
<script type="text/javascript" src="js/index.js"></script>

</html>