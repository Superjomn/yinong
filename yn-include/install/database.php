<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据库配置</title>
<link type="text/css" rel="stylesheet" href="../jquery/jquery-ui/development-bundle/themes/redmond/jquery.ui.all.css" />

<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.dialog.js"></script>
</head>
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
<body>
  <div id="content">
  	<h3><img src="../../yn-admin/image/logo.gif" />Yinong</h3>
  		<form id="database">
    	<table>
        	<tr>
            	<td class="label">数据库名称</td>
                <td><input id="dbname" type="text" value="yinong"/></td><td>你所拥有数据库的名称</td>
            </tr>
            <tr>
            	<td class="label">用户名</td>
                <td><input id="dbuser" type="text" value="admin" /></td><td>你数据库的名称</td>
            </tr>
            <tr>
            	<td class="label">密码</td>
                <td><input id="dbpwd" type="password" /></td><td>你mysql数据库的密码</td>	
            </tr>
            <tr>
            	<td class="label">数据库主机</td>
                <td><input id="dbmain" type="text" value="localhost"/>
                </td><td>通常情况下，应填写 localhost，若测试连接失败，请联系主机提供商咨询</td>
            </tr>
            
        </table>
    	<button type="button" id="submit">提交</button>
    </form>
  </div><!--end content-->
<script type="text/javascript">
	function v(id){
		return $(id).val();
	}
	$(function(){
		$("#submit").click(function(){
			$.post('./install_back.php',{
				   	dbname:v('#dbname'),
					dbuser:v('#dbuser'),
					dbmain:v('#dbmain'),
					dbpwd:v('#dbpwd'),
					kind:1
				   },function(data,textStatus){
				   		alert(data);
					   if($.trim(data)=='ok'){
					   window.location.href='user';
					   }else{
					   		var dialogopt={
							modal:true,
							buttons:{
								"确定":dook
							},
							autoOpen: false
							};
						$("#dialog").dialog(dialogopt);
						   dlg(data);
					 }
			});
		});
	});
</script>
<div id="thedialog" title="安装程序">
	
</div>
<script type="text/javascript">
	var dook=function(){
		$("#dialog").dialog('close');
		//自动进行刷新
		 window.location.href="user.php";
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
</body>
<script type="text/javascript" src="js/index.js"></script>
</html>