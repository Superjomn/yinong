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

<link type="text/css" rel="stylesheet" href="yn-include/css/lookfor_list.css" />

<script type="text/javascript" src="yn-include/jquery/jquery-pager/jquery.pager.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-pager/Pager.css" />
<style>
.li_on{
	background-color:#EBC9F1;
}
.li_spe{
	background-color:#fff;
}
</style>
</head>
<?php
        //$search=trim($_POST['search']);
        //取得 goods 的查询语句
        //每页的页数
        $page_each=7;
        //$pages=(int)($good_num/$page_each)+1;
        //echo "页数为 $pages  商品数为 $good_num";
      ?>
      <?php
        //取得 goods 的查询语句
        $str3="select * from lookfor where status='on'";
        //echo $str3;
        //总商品数
        $lookfor_num=$base->get_count("select count(*) from lookfor where status='on'");
		echo $lookfor_num;
        //每页的页数
        //$page_each=7 与goods一致
        $pages_lookfor=(int)($lookfor_num/$page_each)+1;
        //echo "页数为 $pages  商品数为 $good_num";
      ?>
<body>
  <div id="wrapper" style="border:none;">
    <?php get_header();?>
    <div id="lookfor_list">
      <ul class="lookfor_ul">
              
      </ul>
      <!--分页插件-->
      <div class="clear" style="clear:both; height:0;"></div>
       <div id="lookfor_pager"></div>
    </div> 
    <script type="text/javascript" language="javascript"> 
 
        $(document).ready(function() {
            $("#lookfor_pager").pager({ pagenumber: 1, pagecount: <?php echo $pages_lookfor; ?>, buttonClickCallback: PageClick_lookfor });
            var str1="<?php echo $str3;?>";
            var str=str1.replace(new RegExp("'","g"),"^");

            $.post('yn-include/goods_list.php', {
                kind:'lookfor_field',
                pageEach:<?php echo $page_each;?>,
                pageNum:<?php echo $pages_lookfor;?>,
                goodNum:<?php echo $lookfor_num;?>,
                page:1,
                str:str
            }, function(data,textStatus){
                //alert(data);
                $(".lookfor_ul").html(data);
                //样式刷新
                $(".lookfor_ul li:even").addClass('li_spe');
                $(".lookfor_ul li").mouseover(function(){
                      $(this).removeClass('li_spe').addClass('li_on');
                });
                $(".lookfor_ul li").mouseout(function(){
                    $(this).removeClass('li_on');
                    $(".lookfor_ul li:even").addClass('li_spe');
                });
               //样式刷新结束
            });

        });
 
        PageClick_lookfor = function(pageclickednumber) {
            $("#lookfor_pager").pager({ pagenumber: pageclickednumber, pagecount: <?php echo $pages_lookfor; ?>, buttonClickCallback: PageClick_lookfor });
			var str1="<?php echo $str3;?>";
            var str=str1.replace(new RegExp("'","g"),"^");
            $.post('yn-include/goods_list.php', {
                kind:'lookfor_field',
                pageEach:<?php echo $page_each;?>,
                pageNum:<?php echo $pages_lookfor;?>,
                goodNum:<?php echo $lookfor_num;?>,
                page:pageclickednumber,
                str:str
            }, function(data,textStatus){
                //alert(data);
                $(".lookfor_ul").html(data);
                //样式刷新
                $(".lookfor_ul li:even").addClass('li_spe');
                $(".lookfor_ul li").mouseover(function(){
                      $(this).removeClass('li_spe').addClass('li_on');
                });
                $(".lookfor_ul li").mouseout(function(){
                    $(this).removeClass('li_on');
                    $(".lookfor_ul li:even").addClass('li_spe');
                });
               //样式刷新结束
            });

            
        }
       
    </script> 
      
    <?php get_footer();?>
  
  </div><!--end wrapper-->
</body>


</html>