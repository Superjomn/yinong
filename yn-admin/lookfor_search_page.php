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
.lookfor_ul a{
	color:blue;
	font-weight:bold;
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

.li_on{
	background-color:#EBC9F1;
}
.li_spe{
	background-color:#eee;
}

</style>
<?php
        $search=trim($_POST['search']);
        $page_each=7;
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
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">求购信息搜索</h3> 
    <form id="search_form" method="post" action="lookfor_search_page.php">
    <table>
      <tr>
        <td align="center" id="search_td">
        	<input name="search" type="text" />
        </td>
        <td>
            <button type="submit">搜索</button>          
        </td>
      </tr>
    </table>
    </form>
    <table class="lookfor_ul">
    	
    <tr><td>名称</td> <td>创建日期</td><td>回复数</td></tr>
         
    <?php
			$lookfor->get($str3,0,100);
        for($i=0;$i<$lookfor->return_count();$i++){
            $lookfor->get_lookfor('lookfors', $i);
            //发布者的信息
            $user_id=$lookfor->get_fromid();
            $user->set_id($user_id);
            $user->get_user();
        ?>
           <tr>
            <td><a href="../lookfor?id=<?php echo $lookfor->get_id(); ?>" target="_blank"><?php echo $lookfor->get_name();  ?></a></td>
            <td><?php $lookfor->get_date();?></td>
            <td class="reply_num"><?php
             $id=$lookfor->get_id();
             	echo $comment->get_comment_num($id,'lookfor');
            ?></td>
          </tr>
          <?php
			}
		  ?>
          <script type="text/javascript">
		   	$(function(){
				$(".lookfor_ul tr:even").addClass('li_spe');	   
			});
			
		  </script>
		
    </table>
    <div style="clear:both;height:0;width:100%;"></div>
</div>

	






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