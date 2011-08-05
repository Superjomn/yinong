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

    $good->set_id($good_id);
     
    $good->get_good("", 0);
    //$good->get_name();
    $owner_id=$good->get_ownerid();
     //echo 'id is'.$owner_id;
    $user->set_id($owner_id);
    $user->get_user();
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php $good->get_name(); ?></title>
<script type="text/javascript" src="yn-include/js/good.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/theme/lavender/css/good.css"/>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>


</head>

<body>
  <div id="wrapper">
      <input value="<?php echo $good->get_id(); ?>" id="goodid" class="value"/>
  <?php require'header.php';?>
  <table><tr><td valign="top">
   <div id="barleft" class="small_bar ui-widget-content ui-corner-all" style="background-color:#fff; padding:10px; float:left;">
      <h3 class="qiugou ui-widget-header ui-corner-all" style="text-align:center; padding:4px;">宝贝信息</h3> 
       <div id="name"><?php $good->get_name();?>[<?php $good->get_sendto();?>]</div>
    <div id="pic_show">
       <div class="zxx_test"> 
    <ul class="left_thumb"> 
        <li> 
            <a href="<?php $good->get_leftimg();  ?>">
                <img class="on" src="<?php $good->get_leftimg();  ?>"/>
            </a> 
        </li> 
        <li> 
            <a href="<?php $good->get_fronimg(); ?>">
                <img src="<?php $good->get_fronimg(); ?>" />
            </a> 
        </li> 
        <li> 
            <a href="<?php $good->get_topimg();  ?>">
                <img src="<?php $good->get_topimg();  ?>" />
            </a> 
        </li> 
        <li> 
            <a href="<?php $good->get_backimg();  ?>">
                <img src="<?php $good->get_backimg();  ?>" />
            </a> 
        </li> 
    </ul> 
    <div class="preview_right"> 
        <img id="previewImg" src="<?php $good->get_leftimg();  ?>" />
    </div> 
   </div> <!--end zxx_test-->
  </div><!--end pic_show-->
  <div id="description">
     <?php $good->get_description(); ?>
  
  
  </div><!--end description-->
  <div id="tag">
      <span class="tag"><?php $good->get_tag();  ?></span>
    <div class="clear"></div>
  </div>
  <div id="old">
      <?php $good->get_old();  ?>
  </div>
  <?php
    $sendto=$good->return_sendto();
    switch ($sendto){
        case '跳蚤市场':
echo <<<EOT
  <div id="price"class="small_bar ui-widget-content ui-corner-all">
  <h3 class="bar_h ui-widget-header ui-corner-all">价格</h3>
      <span class="price">
EOT;
        $good->get_price();
        echo"</span></div>";
        break;
    ///////////////////////////////////////////////////
    case '以物易物':
        echo <<<EDD
        <div id="exchangefor"class="small_bar ui-widget-content ui-corner-all">
      <h3 class="bar_h ui-widget-header ui-corner-all">我要交换</h3>
      <span id="exchangeis">
EDD;
        $good->get_exchangefor();

        echo <<<EKD
        </span><br/>
      <span style="font-weight: bold;">描述:</span>
      <span id="miaoshu">
EKD;
       $good->get_miaoshu();
       echo "</span></div>";
       break;

    }
  ?>

  <div id="reply">
    <span id="reply_author">
      <?php $user->login();?>
    </span>
<?php
//如果已经登录，则显示回复框
$owner_id=$good->get_ownerid();
if( (int)$user_id == (int)$owner_id ){
    //如果是拥有者登陆，则显示他人的回复
    //用户的相关信息
    $comment->get_good_comment('on', $good_id, 0, 100);
    for($i=0;$i<$comment->return_count();$i++){
        $comment->get_comment('comments', $i);
        $user->set_id($comment->get_fromid());
        $user->get_user();

?>
    <div class="commenton">
      	<img src="<?php $user->get_photo(); ?>" />
        <h4><a href="#"><?php $user->get_name(); ?></a></h4><?php $comment->get_date();?><br/>
        <?php $comment->get_cotent(); ?>
    </div><!--end commenton-->
<?php
    }
}
if($_SESSION['onload']==TRUE){
 echo <<<EOD
 <form>
 <textarea name="reply">
 </textarea>
    <button type="button" id='reply_bn'>回复</button>&nbsp;&nbsp;&nbsp;
    <button type="reset">重置</button><div class="clear">
 </form>
EOD;
 }
?>
</div>
      
    
  
  
 </div><!--end barleft-->
 </td><td valign="top">
<?php
	require 'user_info_panel.php';
?>
</td></tr></table>
     
  <?php require'footer.php';?>
  </div><!--end wrapper-->
  <script type="text/javascript">
    $(function(){
   $("#reply_bn") .click(function(){
       if($.trim($("[name=reply]").val()).length==0){
           $("[name=reply]").css({
               'border-color':'red',
               'background-color':'red'
           });
       }else{
       $.post("yn-include/comments.php", {
           touserid:<?php echo $good->get_ownerid();  ?>,
            goodid:$("#goodid").val(),
            comment:$("[name=reply]").val()
       }, function(data,textStatus){
            //console.info(data);
			window.location.reload();
			
       });
       }//end if
   });
});
  
      
  </script>

<script type="text/javascript">
$(function(){
	$(".left_thumb > li > a").each(function(){
		$(this).find("img").hover(function(){
			$(this).animate({
				width: 120,
				height: 85,
				padding: 10,
				left: -10,
				top: -18
			},200).addClass("hover");				   
		},function(){
			$(this).animate({
				width: 100,
				height: 75,
				padding: 3,
				left: 0,
				top: 0
			},200).removeClass("hover");	
		});	
		$(this).click(function(){
			//添加当前选中图片样式
			$(".left_thumb > li > a > img").removeClass("on");
			$(this).find("img").addClass("on");
			//切换大图url路径
			$("#previewImg").attr("src",$(this).attr("href"));
			return false;
		}).hover(function(){
			$(this).css("z-index",1);	
		},function(){
			$(this).css("z-index",0);
		});
	});
        //浏览器样式兼容性
        //ie 7 8 的兼容  解决用户信息框的突出
		/*
        if($.browser.msie){
            //alert($.browser.version);            
                $("#user_bar").width(280);
           
        }
		*/


});

</script>


</body>
</html>