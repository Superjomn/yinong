<div id="header">
  <b><a href="../index" target="_blank">易农换吧</a></b>
  <div id="login">
    欢迎你，<?php echo $_SESSION['user_name'];?> | <a id="loginout" href="#">登出</a>
  </div> <div style="clear:both; width:100%; height:0;" ></div>
</div><!--end header-->
<?php
if(!$_SESSION['onload']||!$_SESSION['user_id']||!$_SESSION['user_name'])
	header('location:../denglu');
?>
<script type="text/javascript">
$(function(){
	$("#loginout").click(function(){
								  alert('out');
		$.post('core/login.php',{
			   kind:'loginout'
		},function(data,textStatus){				
			//alert(data);
			window.location.href='../denglu.php';   
	   });
	});
});
</script>
<style>
/*for ie6 and ie7*/
#header{
	width:100%;
}
*html #header{
	width:86%;
}
*+html #header{
	width:88%;
}
*+html #login{
	margin-bottom:10px;
}
*+html #header{
	height:70px;
}

</style>