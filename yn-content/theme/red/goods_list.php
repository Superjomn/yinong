<?php require'functions.php';?>
<?php session_start();?>
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
//导航
$first=$_GET['first'];
$second=$_GET['second'];
switch($first){
	case 'home':
	$field='易农首页';
	break;
	case 'fcg':
	$field='学友火炬';

	break;
	case 'exc':
	$field='以物易物';
	break;
	case 'shg':
	$field='跳蚤市场';
	break;
        default:
        $field='学友火炬';
}
switch($second){
	case 'lei1':
            $lei='图书/文具用品';
            $leistr="sort='图书资料' or sort='文具用品'";
        break;
        case 'lei2':
            $lei='电子/电脑配件';
            $leistr="sort='电子产品' or sort='电脑配件'";
        break;
        case 'lei3':
            $lei='体育/娱乐相关';
            $leistr="sort='体育娱乐'";
        break;
        case 'lei4':
            $lei='生活/女生专区';
            $leistr="'生活/女生专'";
        break;
        //具体类
        case 'a':
            $lei='图书资料';
        break;
        case 'b':
            $lei='文具用品';
        break;
        case 'c':
            $lei='电脑配件';
        break;
        case 'd':
            $lei='电子产品';
        break;
        case 'e':
            $lei='体育娱乐';
        break;
        case 'f':
            $lei='生活/女生专区';
        break;

}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品列表</title>
<?php get_eve('goods_list');?>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<!--分页插件-->
<script type="text/javascript" src="yn-include/jquery/jquery-pager/jquery.pager.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-pager/Pager.css" />
<style>
.li_odd{
	background-color:#eee;
}
.li_even{
	background-color:#EDE0EC;
}
.li_over{
	background-color:#E6B7DE;
}
</style>
</head>

<body>
  <div id="wrapper">
    <?php get_header();?>
    <div id="good_list">
      <ul class="small_ul" id="good_ul">
      <?php

      //这个地方做的很好啊
        $str="select * from goods where sendto ='$field' and ($leistr) and status='on'";
        echo $str;
        //总商品数
        $str2="select count(*) from goods where sendto ='$field' and ($leistr) and status='on'";
        $good_num=$base->get_count($str2);
        //每页的页数
        $page_each=7;
        $pages=(int)($good_num/$page_each)+1;
        //echo "页数为 $pages  商品数为 $good_num";
      ?>
      
           
        <div class="clear"></div>
      </ul>   <div class="clear"></div>
      <!--分页插件-->
      <div class="clear" style="clear:both; height:0;"></div>
      <div id="pager" style="margin-top:15px;"></div>
    </div> 
    <script type="text/javascript" language="javascript"> 
 
        $(document).ready(function() {
            $("#pager").pager({ pagenumber: 1, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
            var str1="<?php echo $str;?>";
            var str=str1.replace(new RegExp("'","g"),"^");

            $.post('yn-include/goods_list.php', {
                kind:'good_field',
                pageEach:<?php echo $page_each;?>,
                pageNum:<?php echo $pages;?>,
                goodNum:<?php echo $good_num;?>,
                page:1,
                str:str
            }, function(data,textStatus){
               // alert(data);
                $(".small_ul").html(data);
				$('button').button();
				$('#good_ul li:even').addClass('li_even');
				$('#good_ul li:odd').addClass('li_odd');
				$('#good_ul li').hover(
					 function(){
						 $(this).addClass('li_over');
				 },
				 function(){
					 $(this).removeClass('li_over');
				 }	
				);
            });

        });
 
        PageClick = function(pageclickednumber) {
            $("#pager").pager({ pagenumber: pageclickednumber, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
            $.post('yn-include/goods_list.php', {
                kind:'good_field',
                pageEach:<?php echo $page_each;?>,
                pageNum:<?php echo $pages;?>,
                goodNum:<?php echo $good_num;?>,
                page:pageclickednumber,
                str:"<?php echo $str;?>"
            }, function(data,textStatus){
                //alert(data);
                $(".small_ul").html(data);
				$('button').button();
				$('#good_ul li:even').addClass('li_even');
				$('#good_ul li:odd').addClass('li_odd');
				$('#good_ul li').hover(
				 function(){
					 $(this).addClass('li_over');
				 },
					 function(){
					 $(this).removeClass('li_over');
				 }		
				);
            });

            
        }
       
    </script> 
      
    <?php get_footer();?>
  
  </div><!--end wrapper-->
</body>


</html>