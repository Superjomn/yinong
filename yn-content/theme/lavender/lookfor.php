<?php
    session_start();
	$user_id=$_SESSION['user_id'];
	$user_name=$_SESSION['user_name'];
    require 'yn-include/Good.php';
    require 'yn-include/User.php';
    require_once 'yn-include/Comment.php';
    require_once 'yn-include/Lookfor.php';
    require_once 'yn-include/Base.php';
    $comment=new Comment();
    $lookfor=new Lookfor();
    $user=new User();
    //lookfor的id
    $lookfor_id=$_GET['id'];
    $good=new Good();
    $user=new User();
    $base=new Base();

    $lookfor->set_id($lookfor_id);
     
    $lookfor->get_lookfor(1, 1);
    //$good->get_name();
    $owner_id=$lookfor->get_fromid();
     //echo 'id is'.$owner_id;
    $user->set_id($owner_id);
    $user->get_user();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>忆农网</title>
<link rel="stylesheet" type="text/css" href="yn-include/css/index.css" />
<script type="text/javascript" src="yn-include/js/index.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<script type="text/javascript" src="yn-include/jquery/chajian/image.cycle/jquery.cycle.all.2.72.js"></script>
<script type="text/javascript" src="yn-include/jquery/chajian/image.cycle/chili-1.7.pack.js"></script>

</head>
<style>


#try{
	width:320px;
	height:2px;
}
</style>
<!--开始网页脚-->
<style>
#thebody{
	position:relative;
	top:-20px;
	z-index:1;
	width:100%;
	height:60px;
	background:none;
	background-image:url(yn-include/image/indoor.png);
	background-repeat:no-repeat;
	background-color:none;
	height:600px;
	margin:0;
}

#lookfor{
	text-align:center;
	padding:10px;
}
#lookfor div{
	text-indent:2em;
	text-align:left;
	line-height:1.5em;
	font-size:20px;
}
#lookfor #tag{
	background-color:#eee;
	border:3px dotted yellow;
	font-weight:bold;
}
#lookfor .tag{
	text-decoration:underline;
	font-weight:normal;
}
#lookfor #sort{
	padding:10px;
	font-weight:bold;
}
#lookfor .sort{
	font-weight:normal;
}
/*user bar 开始*/
/*用户信息*/
#user_bar{
	float:left;
	width:320px;
	margin-left:20px;
	text-align:center;
    background-color:#E4EBFA;
	font-size:17px;
}
#user_bar .user_label{
	width:40%;
}
#user_bar table{
	text-align:left;
	padding-left:30px;
}
#user_bar #user{
	width:80%;
	display:block;
	border:4px solid #ccc;
	margin-left:auto;
	margin-right:auto;
}
/*回复*/
#reply_author a{
	color:blue;
	text-decoration:underline;
}
#reply_author a:hover{
	color:red;
	text-decoration:none;
}
form textarea{
	width:90%;
	font-size:18px;
	font-family:"微软雅黑", "黑体";
	height:6em;
}
/*回复*/
.commenton{
	text-align:left;
	padding:10px;
	padding-left:40px;
	margin-bottom:10px;
	border:3px solid #eee;
	background-color:#eee;
}
.commenton a{
	color:blue;
}
.commenton a:hover{
	color:red;
}
.commenton img{
	width:50px;
	height:50px;
	border:3px solid #ccc;
	float:left;
	margin-right:10px;
}
</style>
<body style="background:url(yn-include/theme/lavender/image/back.jpg) center top no-repeat #eee;">
   <div id="wrapper">
      <?php require'header.php';?>     

      <div id="content">
           <div id="lookfor" class="small_bar ui-widget-content ui-corner-all" style="width:63%; float:left;">
    	     <h3 class="qiugou ui-widget-header ui-corner-all">求购信息</h3> 
             <!--求购内容-->
             <br/>
             <br />
             <h2><?php echo $lookfor->get_name(); ?></h2>
             <div id="lookfor_content">
             	<?php echo $base->text_p($lookfor->get_description());  ?>
             </div><br/>
             <div id="tag">
               	标签：<span class="tag"><?php echo $lookfor->get_tag(); ?></span>
             </div>
             <div id="sort">
             	类别：<span class="sort">
                    <?php echo $lookfor->get_sort();  ?>
                </span>
             </div>
			  <div id="reply">
    <span id="reply_author">
      <?php $user->login();?>
    </span>
<?php
//如果已经登录，则显示回复框
$owner_id=$lookfor->get_fromid();
if( (int)$user_id == (int)$owner_id ){
    //如果是拥有者登陆，则显示他人的回复
    //用户的相关信息
    //$comment->get_good_comment('on', $good_id, 0, 100);
    $comment->get("select * from comment where kind='lookfor' and goodid=$lookfor_id");  
    for($i=0;$i<$comment->return_count();$i++){
        $comment->get_comment('comments', $i);
        $user->set_id($comment->get_fromid());
        $user->get_user();

?>
    <div class="commenton">
      	<img src="<?php $user->get_photo();  ?>" />
        <h4><a href="#"><?php $user->get_name(); ?></a></h4>
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
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" id='reply_bn'>回复</button>&nbsp;&nbsp;&nbsp;
    <button type="reset">重置</button><div class="clear">
 </form>
EOD;
 }
?>
</div>       
  </div><!--end reply--> 

          
          
          
        </div><!--end barleft-->
        
        <div id="baright" class="bar">
        	<?php require 'user_info_panel.php';  ?>
        </div><!--baright--><div class="clear"></div>
        
        
        
        
         
      </div><!--end content-->
   <?php require 'footer.php';?>      
   </div><!--end wrapper-->



</body>
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
		   kind:'lookfor',
           touserid:<?php echo $lookfor->get_fromid();  ?>,
            goodid:<?php echo $lookfor_id; ?>,
            comment:$("[name=reply]").val()
       }, function(data,textStatus){
            //console.info(data);
			window.location.reload();
       });
       }//end if
   });
});
	
</script>
</html>