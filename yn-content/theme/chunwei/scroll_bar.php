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
<script type="text/javascript">
$(function(){
    $("#scroll_bar").cycle({fx:'scrollUp',delay:2000});
});//end start
</script>
<style>
.clear{
	clear:both;
	height:0;
}
#scroll_bar{
	position: relative; 
	overflow-x:hidden; 
	overflow-y:hidden; 
	height:620px; 
}
.scroll_div{
	position: absolute; 
	width:100%;
	z-index: 4; 
	left: 0px; 
	opacity: 1; 
	display: block;  
	height: 620px; 
	top: 54.51px; 
	overflow:hidden;
}
#scroll_bar .small_bar{
	width:99%;
}
*+html #scroll_bar{
	height:650px;
}
*+html .scroll_div{
	height:650px;
}


#scroll_bar li{
	display:block;
	padding-bottom:-10px;
	cursor:pointer;
}
#scroll_bar table{
	cursor:pointer;
}
#scroll_bar a{
	display:block;
	padding-bottom:4px;
}
*+html #scroll_bar a{
	padding:0;
}
#scroll_bar img{
	height:70px;
	width:100px;
	border:2px solid #ccc;
	margin-right:5px;
	float:left;
}
#scroll_bar h4{
	font-size:16px;
}
#scroll_bar b{
	font-weight:normal;
	font-size:15px;
	font-family:"微软雅黑", "黑体";
}
#scroll_bar .author{
	color:#999;
	float:right;
}
#scroll_bar .more{
	float:right;
}
#scroll_bar table{
	padding:0;
}
#scroll_bar td{
	padding:0;
	margin:0;
}
</style>


<div id="scroll_bar">
            <div class="scroll_div" >
               <div id="qiugou" class="small_bar ui-widget-content ui-corner-all">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=fcg">学友火炬</a></h3> 
                 <ul>
                     <?php
                        $good->get("select * from goods where sendto='学友火炬' and status='on'",0,6);
                        for($i=0;$i<$good->get_count();$i++){
                            $good->get_good('goods', $i);
                     ?>
                   <li>
                         <table><tr><td><img src="<?php $good->get_leftimg();?>"></td><td>
                         <h4><a href="good?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();?></a></h4>
                         <b><?php $good->get_excerpt(20);
                                                   ?></b>
                         <span class="author"><?php $good->get_owner()
                                                    ;?></span></td></tr></table>
                   </li>
                   <?php
                        }
                     ?>
                   
                 </ul>
                   <span class="more"><a href="field?kind=fcg&page_index=fcg">更多...</a></span>
                   <div class="clear"></div>
			   </div>
            </div><!--scroll_div-->
            <div  class="scroll_div">
<div id="qiugou" class="small_bar ui-widget-content ui-corner-all">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=exc">以物易物</a></h3> 
                 <ul>
                     <?php
                        $good->get("select * from goods where sendto='以物易物' and status='on'",0,6);
                        for($i=0;$i<$good->get_count();$i++){
                            $good->get_good('goods', $i);
                     ?>
                   <li>
                         <table><tr><td><img src="<?php $good->get_leftimg();?>"></td><td>
                         <h4><a href="good?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();?></a></h4>
                         <b><?php $good->get_excerpt(20);
                                                   ?></b>
                         <span class="author"><?php $good->get_owner()
                                                    ;?></span></td></tr></table>
                   </li>
                   <?php
                        }
                     ?>

                 </ul>
                   <span class="more"><a href="field?kind=fcg&page_index=exc">更多...</a></span><div class="clear"></div>
			   </div>
            </div><!--end scroll_div-->
            <div class="scroll_div">
<div id="qiugou" class="small_bar ui-widget-content ui-corner-all">
    	         <h3 class="ui-widget-header ui-corner-all"><a href="field?kind=fcg&page_index=shg">跳蚤市场</a></h3> 
                 <ul>
                     <?php
                        $good->get("select * from goods where sendto='跳蚤市场' and status='on'",0,6);
                        for($i=0;$i<$good->get_count();$i++){
                            $good->get_good('goods', $i);
                     ?>
                   <li>
                         <table><tr><td><img src="<?php $good->get_leftimg();?>"></td><td>
                         <h4><a href="good?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();?></a></h4>
                         <b><?php $good->get_excerpt(20);
                                                   ?></b>
                         <span class="author"><?php $good->get_owner()
                                                    ;?></span></td></tr></table>
                   </li>
                   <?php
                        }
                     ?>

                 </ul>
                 <span class="more"><a href="field?kind=fcg&page_index=shg">更多...</a></span><div class="clear"></div>
			   </div>
            </div><!--end scroll_div-->
</div>