<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];

$filename='belly_panel';
require 'panel_header.php';
require_once '../yn-include/core.php';

$base=new Base();
$comment=new Comment();
?>

<?php
require_once '../yn-include/Base.php';
require_once '../yn-include/Comment.php';
require_once '../yn-include/User.php';
require_once '../yn-include/Good.php';
require_once '../yn-include/Lookfor.php';
require_once '../yn-include/Option.php';
$option=new Option();
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
//curent theme is 
$theme_cur=$option->get_theme_path();
$theme_img='../yn-content/theme/'.$theme_cur.'/yinong.jpg';
?>
<style>
.theme_div{
border:2px solid #000;
width:400px;
float:left;
text-align:center;
padding:20px;
margin:20px;
}
img.theme_show{
	width:300px;
	border:4px solid #ccc;
	margin:20px;
}
#img_cur{
	width:300px;
	border:4px solid yellow;
	margin:20px;
	}
.themer{
	font-size:20px;
	font-weight:bold;
}
.clear{
clear:both;
height:0;
width:100%;
}
.li_over{
border:2px solid yellow;
background-color:#eee;
}


</style>
<?php

?>
<div id="cj_panel" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">主题模板设置</h3>
  <div id="theme_curent">
  	<img id="img_cur" src="<?php echo $theme_img; ?>"/>
  
  </div><!--theme_curent-->
	<?php
		function get_dir_glob(){
	$tree = array();
	foreach(glob('../yn-content/theme/*') as $single){
		$whole=strlen($single);
		$start=strlen('../yn-content/theme/');
		//echo $single;
		$theme=substr($single,$start,$whole);
	?>
	  <div class="theme_div">
		<img class="theme_show" src="<?php echo $single.'/yinong.jpg'; ?>"/><br/>
		<div class="themer">
			<?php echo $theme;?>
		</div>
		<button type="button" name="<?php echo $theme;?>" class="open">启用</button>
	   </div>
	<?php
		//echo $single."<br/>\r\n";
	}
}
	get_dir_glob(); 

	?>


<script type="text/javascript">
	$(function(){
		$('button.open').click(function(){
			var theme=$(this).attr('name');
			$.post('core/theme_panel.php',{
				theme:theme,
				kind:'theme_set'
			},function(data,textStatus){
				//alert(data);
				$('#img_cur').attr('src','../yn-content/theme/'+theme+'/yinong.jpg');
			});//end post
		});
		$('.theme_div').hover(
					 function(){
						 $(this).addClass('li_over');
				 },
				 function(){
					 $(this).removeClass('li_over');
				 }	
				);
	});
</script>
<div class="clear"></div>
</div>
<?php require'footer.php';?>


