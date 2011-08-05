<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>数据库向导</title>
<link type="text/css" rel="stylesheet" href="../jquery/jquery-ui/development-bundle/themes/redmond/jquery.ui.all.css" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<style>
	body{
		background-color:#eee;}
	#content{
		margin-left:auto;
		margin-right:auto;
		width:800px;
		border:1px solid #999;
		background-color:#fff;
		padding:20px 45px;
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
</style>
</head>

<body>
   <div id="content">
   	<h3><img src="../../yn-admin/image/logo.gif" />Yinong</h3>
	<p>欢迎使用易农易购平台，在正式安装之前，易农需要准备一些数据库方面的信息。</p>
    <p>请注意下方的信息：</p>
    <ol>
    	<li>易农将需要一块数据库</li>
        <li>目标数据库名称</li>
        <li>数据库用户名</li>
        <li>数据库密码</li>
        <li>易农将会在目标数据库中插入：user,goods,lookfor,comment,ynoption 等5个表，请注意避免与其他表的冲突 </li>
   </ol>
   <button type="button" class="a" hr="database">我准备好了</button>
   </div>
</body>
<script type="text/javascript" src="js/index.js"></script>
</html>