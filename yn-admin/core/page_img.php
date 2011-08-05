<?php
//页面pager的id
/*
$pagerid='pager';
$page_kind='goods';  //取得元素的状态
$page_status='on';
$pages_each=7;
$table_id='table';
$core_id='page';
*/
//取得总页数

$num=4*$base->get_count("select count(*) from $page_kind where status='$page_status'");  
	

//$num=$base->get_count("select count(*) from $page_kind where status='$page_status'");  
//对用户处理，加入一些补丁

    $pages=(int)($num/$pages_each+1)-1;
?>
<div id="<?php echo $pagerid;?>"></div>
<div style="height:0; clear:both; width:100%;"></div>
<script type="text/javascript">
//页面插件动作
    //初始化时更新
$(function(){
        $.post('core/<?php echo $core_id;?>.php', {
            page_cur:1,
            kind:'<?php echo $page_kind;?>'
        }, function(data,textStatus){
            //alert(data);
			//console.info(data);
			/*
				此处解决了 ie7 对table 下的html的兼容性问题
				在core层，直接输出表格 将前台的 table改为div
			*/
            $("#<?php echo $table_id; ?>").html(data);
			$('button').button();
			$('tr:even').css({
       			 'background-color':'#eee'
   			});
			//加入 单个删除 模块
			
			//$in=data;
			//alert(data);
			
			
			
            
        });
    });

$(document).ready(function() {
            //初始化pager
    $("#<?php echo $pagerid; ?>").pager({ pagenumber: 1, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
});
 
        PageClick = function(pageclickednumber) {
            $("#<?php echo $pagerid; ?>").pager({ pagenumber: pageclickednumber, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
            //回调函数
            $.post("core/<?php echo $core_id; ?>.php", {
            page_cur:pageclickednumber
        }, function(data,textStatus){
            //alert(data);
			//alert(data);
			//console.info(data);
            $("#<?php echo $table_id; ?>").html(data);
			$('button').button();
			$('tr:even').css({
       			 'background-color':'#eee'
   			});
            
        });
    }
	
$(function(){
	$("#delete_all").click(function(){
		$.post('core/delete_pic.php',{
			   	kind:'delete_all'
			   },function(data,textStatus){
				   dlg('成功删除用户所有上传原始图片！');
		});
	});
			   
});

</script>