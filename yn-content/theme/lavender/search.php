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

<title>忆农网</title>
<link rel="stylesheet" type="text/css" href="yn-include/css/index.css" />
<script type="text/javascript" src="yn-include/js/index.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>


<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<!--分页插件-->
<script type="text/javascript" src="yn-include/jquery/jquery-pager/jquery.pager.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-pager/Pager.css" />
<link type="text/css" rel="stylesheet" href="yn-include/css/goods_list.css" />
<link type="text/css" rel="stylesheet" href="yn-include/css/lookfor_list.css" />
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
	background-color:#EBC9F1;
}
.li_spe{
	background-color:#eee;
}
/*定制本页面的样式*/
#good_list{
	margin-left:20px;
	display:inline;
}
#lookfor_list{
	margin-left:30px;
	float:left;
	display:inline;
}
</style>
<body>
   <div id="wrapper">
      <?php require'header.php';?>
      <?php
        $search=trim($_POST['search']);
        //取得 goods 的查询语句
        $str1=$base->search('goods', $search);
        //总商品数
        $good_num=$base->search_count('goods', $search);
        //每页的页数
        $page_each=7;
        $pages=(int)($good_num/$page_each)+1;
        //echo "页数为 $pages  商品数为 $good_num";
      ?>
      <?php
        //取得 goods 的查询语句
        $str3=$base->search('lookfor', $search);
        //echo $str3;
        //总商品数
        $lookfor_num=$base->search_count('lookfor', $search);
        //每页的页数
        //$page_each=7 与goods一致
        $pages_lookfor=(int)($lookfor_num/$page_each)+1;
        //echo "页数为 $pages  商品数为 $good_num";
      ?>

      
      

      <div id="content">
        <div id="good_list" class="bar ui-widget-content ui-corner-all"
        		style="width:450px;">
        	  <h3 class="ui-widget-header ui-corner-all">宝贝搜索结果</h3>

            <ul class="small_ul">

            </ul>
            <div id="pager" ></div>
        </div><!--end barmid-->
        
		<div id="lookfor_list" class="bar ui-widget-content ui-corner-all"
        		style="width:450px;">
        	  <h3 class="ui-widget-header ui-corner-all">求购信息搜索结果</h3>  
              <ul class="lookfor_ul">
              
              </ul>
          <div id="lookfor_pager"></div>

        </div><!--baright-->				
        <div class="clear"></div>
         
      </div><!--end content-->
   <?php require 'footer.php';?>      
   </div><!--end wrapper-->

    <script type="text/javascript" language="javascript"> 
       //中央 商品搜索栏返回结果---------------------------------------------------------------------------------------
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
	//右侧 求购信息返回结果-----------------------------------------------------------------------------------------
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


</body>
</html>