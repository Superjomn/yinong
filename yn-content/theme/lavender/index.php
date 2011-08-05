
<?php
require_once 'yn-include/User.php';
require_once 'yn-include/Good.php';
require_once 'yn-include/Comment.php';
require_once 'yn-include/Base.php';
require_once 'yn-include/Lookfor.php';
require_once 'yn-include/Wordpress.php';
require_once 'yn-include/Option.php';
$good=new Good();
$user=new User();
$comment=new Comment();
$base=new Base();
$lookfor=new Lookfor();
$option=new Option();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>忆农网</title>
<link rel="stylesheet" type="text/css" href="yn-include/theme/lavender/css/index.css" />

<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>

<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
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
.li_on{
	background-color:#BDCBEC;
}
.li_spe{
	background-color:#eee;
}

</style>
<body>
   <div id="wrapper">   
   
      <?php require'header.php';?>
      <?php require'scroll_adv.php';?>   
      

      <div id="content">
        <div id="barleft" class="bar">
          <?php require'img_show.php';?>
          
          <!--求购信息-->
          <div id="qiugou" class="small_bar ui-widget-content ui-corner-all">
    	     <h3 class="qiugou ui-widget-header ui-corner-all">求购信息</h3> 
               <ul id="qiugou_ul">
                   <?php
                    $lookfor->get_lookfors('on', 0, 8);
                    for($i=0;$i<$lookfor->return_count();$i++){
                        $lookfor->get_lookfor('lookfors', $i);

                   ?>
                   <li><a href="lookfor?id=<?php echo $lookfor->get_id();?>&page_index=lookfor"><?php echo $lookfor->get_name();  ?></a></li>
                   <?php
                    }
                   ?>
                 <span class="more"><a href="lookfor_list.php?page_index=lookfor_list">更多...</a></span>
               </ul>     
          
          
          </div><!--end qiugou-->
          
          
          
        </div><!--end barleft-->
        <div id="barmid" class="bar" style="width:34%;">
          <!--滚动栏-->
          <?php require 'scroll_bar.php';?> 
         
        
        </div><!--end barmid-->
        
        <div id="baright" class="bar">
          <div id="site_info">
             <ul>
               <li>
                 <h4>宝贝</h4>
                 <b>32</b>
               </li>
               <li>
                 <h4>会员</h4>
                 <b>7</b>
               </li>
               <li>
                 <h4>今日宝贝</h4>
                 <b>9</b>
               </li>
             </ul>
          </div><!--end site_info--><div class="clear"></div>
          <div id="school_info">
            <?php require'school_tabs.php';?>
          
          </div><!--school_info-->
          <div id="member" class="small_bar ui-widget-content ui-corner-all">
    	     <h3 class="qiugou ui-widget-header ui-corner-all">活跃会员</h3>
             <ul>
             <?php
                $user->get_users(0, 9);
                for($i=0;$i<$user->get_count();$i++){
                    $user->get_each_user($i);
             ?>
             
             <li><a href="user_good_list?id=<?php echo $user->get_id(); ?>"><span class="num">$i</span>  <?php $user->get_name(); ?> <span class="level">7</span></a></li>
             <?php
                }
              ?>
            
             </ul>
          </div><!--member-->
        </div><!--baright--><div class="clear"></div>
         
      </div><!--end content-->
      <div id="bar_blog" class="small_bar ui-widget-content ui-corner-all">
    	     <h3 class="qiugou ui-widget-header ui-corner-all">绿色博文</h3> 
               <?php echo $blog;?>
         
      	 <table>
		 	<tr>
		 	<?php
	  		$wp=new Wordpress();
			$termid=$wp->get_term_id('lvse');
			$wp->get_wps($termid,3);
			for($i=0;$i<$wp->get_count();$i++){	
				$wp->get_wp($i);
	  		 ?>
       	<td>
			<h3><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>"><?php $wp->get_title(); ?></a></h3>
 			<p><?php $wp->get_except(200); ?></p>
             <span class="more"><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>">继续阅读</a></span>
		</td>
       		<?php	
				}
	 		 ?>
           
            </tr>
         
         </table>
         
      </div><!--end bar_blog-->
      </div>
   <?php require 'footer.php';?>      
  </div><!--end wrapper-->



</body>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>

<script type="text/javascript" src="yn-include/js/index.js"></script>
<script type="text/javascript">
$(function(){
	$("#content li:even").addClass('li_spe');	
	$("#content li").mouseover(function(){
	    $(this).removeClass('li_spe').addClass('li_on');
	});
	$("#content li").mouseout(function(){
		$(this).removeClass('li_on');
		$("#content li:even").addClass('li_spe');
	});
	
	$(".tab_div a").click(function(){
		var url=$(this).attr('href');
		url='blog?url='+url;
		//alert(url);
		window.location.href=url;
		return false;
	});
	
	//浏览器样式兼容性
        //ie 7 的兼容  解决用户信息框的突出
       
	//浏览器样式兼容性
        //ie 7 的兼容  解决用户信息框的突出
        if($.browser.msie){
            //alert($.browser.version);
            if($.browser.version=='7.0'){
                $("#scroll_bar").cycle({fx:'fade',delay:2000});				
            }else
			{
				$("#scroll_bar").cycle({fx:'scrollUp',delay:2000});
			}
        }
});
</script>


</html>