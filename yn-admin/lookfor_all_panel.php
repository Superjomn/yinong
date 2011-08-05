<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
?>
<?php 
	$filename='control_panel';?>
<?php
require_once '../yn-include/Base.php';
require_once '../yn-include/Comment.php';
require_once '../yn-include/User.php';
require_once '../yn-include/Good.php';
require_once '../yn-include/Lookfor.php';
require_once '../yn-include/Base.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
$base=new Base();
?>

<?php $filename='pic_panel';?>
<?php require 'panel_header.php';?>


<script type="text/javascript" src="../yn-include/jquery/jquery-pager/jquery.pager.js"></script>
<link rel="stylesheet" type="text/css" href="../yn-include/jquery/jquery-pager/Pager.css" />
<style>
table{
	width:70%;
}
a{
	color:blue;
	text-decoration:underline;
}
a:hover{
	color:red;
}
#search_td{
	text-align:center;
	padding:10px;
}
#search_td *{
	float:left;
}
input#search{
	font-size:17px;
	padding:2px;
	width:60%;
	margin-right:20px;
	margin-left:30px;
}
#lookfor_table a{
	color:blue;
	font-weight:bold;
}

</style>
<script type="text/javascript" src="js/delete.js"></script>
<script type="text/javascript">
    $(function(){
         del('button.delete','lookfor','name');
    });
</script>
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">求购信息</h3> 
    <form id="search_form" method="post" action="lookfor_search_page.php">
    <table>
      <tr><td></td>
        <td align="center" id="search_td">
        	<input name="search" type="text" />
        </td>
        <td>
            <button type="submit">搜索</button>          
        </td>
      </tr>
    </table>
    </form>
    <div id="lookfor_table">
      <!--中间自动初始化填充-->
    </div>
    <div id="pager" ></div>
    <div style="clear:both;height:0;width:100%;"></div>
</div>
<?php
    $num=$base->get_count("select count(*) from lookfor where status='on'");
    $pages_each=7;
    $pages=(int)($num/$pages_each+1);
    //echo $pages;
?>
<script type="text/javascript">
    //初始化时更新
    $(function(){
        $.post('core/lookfor_all_page.php', {
            page_cur:1,
            kind:'lookfor_all'
        }, function(data,textStatus){
           // alert(data);
            $("#lookfor_table").html(data);
            $('button').button();
			del('button.delete','lookfor','name');
			bac('button.bohui','lookfor','name');
        });
    });
    //页面插件动作
	$(document).ready(function() {
            //初始化pager
            $("#pager").pager({ pagenumber: 1, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
        });
 
        PageClick = function(pageclickednumber) {
            $("#pager").pager({ pagenumber: pageclickednumber, pagecount: <?php echo $pages; ?>, buttonClickCallback: PageClick });
            //回调函数
            $.post('core/lookfor_all_page.php', {
            page_cur:pageclickednumber
        }, function(data,textStatus){
            //alert(data);
            $("#lookfor_table").html(data);
            $('button').button();
			del('button.delete','lookfor','name');
			bac('button.bohui','lookfor','name');

        });
    }
</script>

<?php
$help_content=<<<EOD
	 求购信息帮助：<br />
    您现在的角色是 发布者，拥有发布物品、求购信息及处理他人留言的权限。<br /><br />
    控制板主要包括：<br /><br />
  <ul>
     <li><strong>概况</strong>--包括自己宝贝的数量及留言数等信息，点击链接，您可以直接转到相应板块查看。</li><br />    
     <li><strong>最新留言</strong>--方便其他用户与您的交流。 您可以直接回复他们。</li><br />     
     <li><strong>快速发布</strong>--发布您的求购信息，这些信息将加入数据库中，他人可以查询，并且与您联系。</li><br />
      <li>&nbsp;&nbsp;&nbsp;   您可以保存到草稿箱，也可以直接发布。</li><br />
  </ul>
<br />
    <p>
       所有发布信息，责任均由发布者本人承担。网站管理员有责任也有权力驳回发布者不合适的发布信息及求购信息。
    </p>
EOD;
	
	require 'panel_footer.php';
   ?>