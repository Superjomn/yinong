<?php
    session_start();
	$user_id=$_SESSION['user_id'];
	$user_name=$_SESSION['user_name'];
    require 'yn-include/Good.php';
    require 'yn-include/User.php';
    require_once 'yn-include/Comment.php';
	require_once 'yn-include/Base.php';
	require_once 'yn-include/Database.php';
    $comment=new Comment();
	$base=new Base();
    $user=new User();
    $db=new Database();
    $good_id=$_GET['id'];
    $good=new Good();
    $user=new User();  
	$url=$_GET['url'];
	 

   
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>易农博文</title>
<link type="text/css" rel="stylesheet" href="yn-include/css/good.css"/>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<style>
#footer{
margin:0 auto;
}
#theblog{
width:100%;
border:none;
}
</style>


</head>

<body>
 <div id="wrapper">
 <?php require'header.php';?>
	<iframe id="theblog" src="<?php echo $url; ?>">
	
	</iframe><!--end theblog-->
</div><!--end wrapper-->
	<?php require'footer.php';?>

<script type="text/javascript">
	$(function(){
		//$('#theblog').load('yn-content/blog/index.php');
	});
</script>
<script type="text/javascript">
	 function ref(){
	 	$("#theblog").load(function(){
		var mainheight = $(this).contents().find("body").height()+50;		
		$(this).height(mainheight);
		}); 
	 }
	 $(function(){
	 	ref();
	 	setInterval("ref()",2000);
	 });

</script>
</body>

</html>
