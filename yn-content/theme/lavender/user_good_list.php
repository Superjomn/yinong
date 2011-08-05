<?php session_start();?>
<?php
require_once 'yn-include/Good.php';
require_once 'yn-include/User.php';
require_once 'yn-include/Base.php';
require_once 'yn-include/Database.php';

$db=new Database();
$base=new Base();
$ownerid=$_GET['id'];

$good=new Good();
$user=new User();

require'functions.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品列表</title>
<?php get_eve('user_good_list');?>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-pager/jquery.pager.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-pager/Pager.css" />
<link type="text/css" rel="stylesheet" href="yn-include/css/goods_list.css" />
<?php
        //$search=trim($_POST['search']);
        //取得 goods 的查询语句
        $str1="select * from goods where ownerid=$ownerid";
        //总商品数
        $good_num=$base->get_count("select count(*) from goods where ownerid=$ownerid");
        //每页的页数
        $page_each=7;
        $pages=(int)($good_num/$page_each)+1;
        //echo "页数为 $pages  商品数为 $good_num";
      ?>
<style>
.li_on{
	background-color:#EBC9F1;
}
.li_spe{
	background-color:#fff;
}

</style>
<script type="text/javascript">
$(function(){
	$('button').button();
});
</script>
</head>

<body>
  <div id="wrapper" style="border:none;">
    <?php get_header();?>
    <div id="good_list">
      <ul class="small_ul">

       </ul>
       <div id="pager" ></div>
       <!--用户列表结束-->  
   </div> 
    
    
    <?php
		$owner_id=$ownerid;
		require 'user_info_panel.php';  ?>
      
    <?php get_footer();?>
    <script type="text/javascript">
		$(document).ready(function() {
            $("#pager").pager({ pagenumber: 1, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
            var str1="<?php echo $str1;?>";
            var str=str1.replace(new RegExp("'","g"),"^");

            $.post('yn-include/goods_list.php', {
                kind:'good_field',
                pageEach:<?php echo $page_each;?>,
                pageNum:<?php echo $pages;?>,
                goodNum:<?php echo $good_num;?>,
                page:1,
                str:str
            }, function(data,textStatus){
                //alert(data);
                $(".small_ul").html(data);
                //样式刷新
                $(".small_ul li:even").addClass('li_spe');
                $(".small_ul li").mouseover(function(){
                      $(this).removeClass('li_spe').addClass('li_on');
                });
                $(".small_ul li").mouseout(function(){
                    $(this).removeClass('li_on');
                    $(".small_ul li:even").addClass('li_spe');
                });
               //样式刷新结束
            });

        });
 
        PageClick = function(pageclickednumber) {
            $("#pager").pager({ pagenumber: pageclickednumber, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
			var str1="<?php echo $str1;?>";
            var str=str1.replace(new RegExp("'","g"),"^");
            $.post('yn-include/goods_list.php', {
                kind:'good_field',
                pageEach:<?php echo $page_each;?>,
                pageNum:<?php echo $pages;?>,
                goodNum:<?php echo $good_num;?>,
                page:pageclickednumber,
                str:str
            }, function(data,textStatus){
                //alert(data);
                $(".small_ul").html(data);
                //样式刷新
                $(".small_ul li:even").addClass('li_spe');
                $(".small_ul li").mouseover(function(){
                      $(this).removeClass('li_spe').addClass('li_on');
                });
                $(".small_ul li").mouseout(function(){
                    $(this).removeClass('li_on');
                    $(".small_ul li:even").addClass('li_spe');
                });
               //样式刷新结束
            });

            
        }
	</script>
  
  </div><!--end wrapper-->
</body>
</html>