<?php
require_once 'yn-include/User.php';
require_once 'yn-include/Good.php';
require_once 'yn-include/Comment.php';
require_once 'yn-include/Base.php';
require_once 'yn-include/Lookfor.php';
$good=new Good();
$user=new User();
$comment=new Comment();
$base=new Base();
$lookfor=new Lookfor();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索</title>
<link rel="stylesheet" type="text/css" href="../../../yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<link rel="stylesheet" type="text/css" href="../../../yn-include/css/index.css" />
<script type="text/javascript" src="../../../yn-include/jquery/jquery-ui/development-bundle/jquery-1.4.2.js"></script>
<script type="text/javascript" src="../../../yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../../yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../../yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="../../../yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.autocomplete.js"></script>
<script type="text/javascript" src="../../../yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
</head>
<body>
<div id="wrapper">
	<!--header开始-->
    	<?php
	$base_path='http://localhost:8080/yinong';
	$module_path='yn-content/theme/chunwei';
	$this_path=$base_path.'/'.$module_path.'/';
	echo $this_path;
	function mdpath(){
		$base_path='http://localhost:8080/yinong';
		$module_path='yn-content/theme/chunwei';
		$this_path=$base_path.'/'.$module_path.'/';
		echo $this_path;
	}
?>
<?php 
	//导航树
	$page_index=$_GET['page_index'];
	function daohang($str,$text){
		echo "<li><a href='$str'>$text</a></li>";
	}
	
	
?>
<div id="header">
   <div id="logo">
     <img src="yn-include/image/index_logo.png" style="width:100px" />
   </div>
   <div id="login">
   <?php
    $user=new User();
   	$user->login();
        $kind=$_GET['kind'];
   ?>
   </div>
   <ul>
       <li><a href="index.php?page_index=index" id="home">
             <h4>易农主页</h4>
             <b>Home</b>
        </a></li>
        <li><a href="field?kind=fcg&page_index=fcg" id="fcg">
             <h4>学友火炬</h4>
             <b>Fcg</b>
         </a></li>
         <li><a href="field?kind=exc&page_index=exc" id="exc">
             <h4>以物易物</h4>
             <b>Exc</b>
         </a></li>
         <li><a href="field?kind=shg&page_index=shg" id="shg">
             <h4>跳蚤市场</h4>
             <b>Shg</b>
         </a></li>
         <li><a href="blog/" id="blog">
             <h4>易农博文</h4>
             <b>Blog</b>
         </a></li>
   </ul>
</div><!--end header-->
<div class="clear"></div>
<style>
.bottom_input{
	width:350px;
	margin-left:auto;
	margin-right:auto;
}
.radio{
	float:left;
	width:100px;
}
.radio input{
}
#header a{
	text-decoration:none;
}
#nav a{
	color:#000;
}
#nav li{
	display:block;
	float:left;
	margin-left:10px;
}
#nav li a:hover{
	color:red;
}

</style>
<?php
	//search的自动提示开始
	//自动提示的相关栏
?>
<form id="search" method="post" action="search.php">
	<input id='search_input' name="search" type="text" />&nbsp;&nbsp;&nbsp;
    <button type="submit" id="search_button">搜索</button>
    
    
    
    
   <div class="bottom_input" ><div class="clear"></div>
    	<div class="radio"><input type="radio" name="field"  style="float:left; display:block;"/>学友火炬</div>
    	<div class="radio"><input type="radio" name="field"  style="float:left; display:block;"/>以物易物</div>
    	<div class="radio"><input type="radio" name="field"  style="float:left; display:block;"/>跳蚤市场</div>
        <div class="clear"></div>
   </div><!--end bottom_input-->

</form>
      <div id="roll_info">
        <img src="yn-include/image/icon/Home.png" />
      
      </div>
	<div id="homenav" style="color:#000; font-size:18px;">
	<ul id="nav">
    	<?php
            $kind=$_GET['first'];
	    switch($page_index)	{
                case 'index':
                    daohang('index?page_index=index','首页');
                break;
                case 'fcg':
                    daohang('index','首页');
                    daohang('field?kind=fcg&page_index=fcg', '学友火炬');
                break;
                case 'exc':
		    daohang('index','首页');
                    daohang('field?kind=exc&page_index=exc','以物易物');
                break;
                case 'shg':
		    daohang('index','首页');
                    daohang('field?kind=shg&page_index=field', '跳蚤市场');
                break;
                case 'good':
                    {
					 $here=$_SERVER["REQUEST_URI"];
                     daohang('index','首页');
                     switch ($kind){
                        case 'fcg':
                              daohang('field?kind=fcg&page_index=fcg', '学友火炬');
                         break;
                         case 'exc':
                              daohang('field?kind=exc&page_index=exc','以物易物');
                         break;
                         case 'shg':
                            daohang('field?kind=shg&page_index=field', '跳蚤市场');
                         break;
                       }
                         daohang("$here", '二手货列表');
                    }           
                    
					

            }
		
        ?>
    	
    </ul>
</div>


    <!--header 结束-->
    <div id="content">


      
        <script type="text/javascript">
		$(function() {
		var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
		$("#search_input").autocomplete({
			source: availableTags
		});
		$('#search_button').button();
	});

	
	</script>

    <?php require'footer.php';?>
	</div><!--end content-->
</div><!--end wrapper-->
</body>
</html>