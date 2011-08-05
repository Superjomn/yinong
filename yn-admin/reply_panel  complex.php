<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
?>
<?php $filename='control_panel';?>
<?php
require_once '../yn-include/Base.php';
require_once '../yn-include/Comment.php';
require_once '../yn-include/User.php';
require_once '../yn-include/Good.php';
require_once '../yn-include/Lookfor.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
?>
<style>
	.value{
		display:none;
	}
</style>

<?php $filename='reply_panel';?>
<?php require 'panel_header.php';?>
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">宝贝留言</h3> 
    <table>
      <tr class="label">
        <td>光顾者</td>
        <td>操作</td>
        <td>宝贝</td>
        <td>内容</td>
      </tr>
      <?php
        $comment->get_user_comments('on', 'comment', $user_id, 0, 100);
        for($i=0;$i<$comment->return_count();$i++){
          $comment->get_comment('comments', $i);
      ?>
      <tr>
          <td><h4><?php
                    $goodid=$comment->get_goodid();
                    $from_user_id=$comment->get_fromid();
                    $good->set_id($goodid);
                    $good->get_good(1, 1);
                    //输出名称
                    //$good->get_name();
                    //会员信息表演
                    $user->set_id($from_user_id);
                    $user->get_user();
                    $username=$user->get_name();
                    ?></h4>
              <img src="<?php $user->get_photo(); ?>" />
        </td>
        <td>
           <button type="button" class="reply_but" replyto="<?php echo $user->get_id(); ?>" replyToName="<?php echo $user->get_name();  ?>" kind="goods" kindid="echo $goodid">回复</button>
           <button type="button" class="del_comment" name="<?php echo $comment->get_id(); ?>">删除</button>
        </td>
        <td><a href="#"><?php $good->get_name(); ?></a></td>
        <td><?php $comment->get_cotent(); ?></td>
      </tr>  
     
      <?php
        }
        ?>
        
    </table>
</div><!--end reply-->
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">求购信息留言</h3> 
    <table>
      <tr class="label">
        <td>光顾者</td>
        <td>操作</td>
        <td>宝贝</td>
        <td>内容</td>
      </tr>
      
        <?php
        $comment->get_user_comments('on', 'lookfor', $user_id, 0, 100);
        for($i=0;$i<$comment->return_count();$i++){
          $comment->get_comment('comments', $i);
      ?>
      <tr>
          <td><h4><?php
                    $goodid=$comment->get_goodid();
                    $from_user_id=$comment->get_fromid();
                    $good->set_id($goodid);
                    $good->get_good(1, 1);
                    //输出名称
                    //$good->get_name();
                    //会员信息表演
                    $user->set_id($from_user_id);
                    $user->get_user();
                    $username=$user->get_name();
                    ?></h4>
              <img src="<?php $user->get_photo(); ?>" />
        </td>
        <td>
           <button type="button" class="reply_but" replyto="<?php echo $user->get_id(); ?>" replyToName="<?php echo $user->get_name();  ?>" kind="lookfor" kindid="<?php echo $goodid; ?>">回复</button>
           <button type="button" class="del_comment" name="<?php echo $comment->get_id(); ?>">删除</button>
        </td>
        <td><a href="#"><?php $good->get_name(); ?></a></td>
        <td><?php $comment->get_cotent(); ?></td>
      </tr>  
     
      <?php
        }
        ?>
    </table>
</div><!--end reply-->
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">已回复留言</h3> 
    <table>
      <tr class="label">
        <td>光顾者</td>
        <td>操作</td>
        <td>宝贝</td>
        <td>内容</td>
      </tr>
      
        <?php
        $comment->get_user_comments('on', 'reply', $user_id, 0, 100);
        for($i=0;$i<$comment->return_count();$i++){
          $comment->get_comment('comments', $i);
      ?>
      <tr>
          <td><h4><?php
                    $goodid=$comment->get_goodid();
                    $from_user_id=$comment->get_fromid();
                    $good->set_id($goodid);
                    $good->get_good(1, 1);
                    //输出名称
                    //$good->get_name();
                    //会员信息表演
                    $user->set_id($from_user_id);
                    $user->get_user();
                    $username=$user->get_name();
                    ?></h4>
              <img src="<?php $user->get_photo(); ?>" />
        </td>
        <td>
           <button type="button" class="reply_but" touserid="<?php echo $user->get_id(); ?>" tousername="<?php echo $user->get_name();  ?>" kind="lookfor" goodid="<?php echo $goodid; ?>" fromname="<?php echo $user_name; ?>" fromid="<?php echo $user_id ?>">回复</button>
           <button type="button" class="del_comment" name="<?php echo $comment->get_id(); ?>">删除</button>
        </td>
        <td><a href="#"><?php $good->get_name(); ?></a></td>
        <td><?php $comment->get_cotent(); ?></td>
      </tr>  
     
      <?php
        }
        ?>
    </table>
</div><!--end reply-->
<!--
<div id="admin_reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">管理员留言</h3>
    <table>
      <tr class="label">
        <td>管理员</td>
        <td>操作</td>
        <td>宝贝</td>
        <td>内容</td>
      </tr>
      <tr>
        <td><h4>小猪达达狼</h4>
            <img src="image/2.jpg" />
        </td>
        <td>
           <button type="button">回复</button>
           <button type="button">删除</button>
        </td>
        <td><a href="#">红色诺基亚手机</a></td>
        <td>哈哈，其实我挺想要的啊。 但是，好像价格太高了点，可不可以低一点啊。</td>
      </tr>    
    </table>
</div> 
-->
<div id="reply_dlg" title="回复" style="height:400px;">
	<span id="reply_dlg_text"></span>
    <input id="goodid" class="value" />
    <input id="fromname" class="value" />
    <input id="fromid" class="value" />
    <input id="touserid" class="value" />
    <input id="kind" class="value" />

	<table>
    	<tr>
        	<td>回复</td><td><textarea id="reply_area"></textarea></td>
         </tr>
         
    </table>
</div>
<script type="text/javascript">
$(function(){
    /*
     * 对class 为 delete 的按钮起作用
     */
    //标准 <button type="button" class="delete" name="" kind='lookfor'>删除</button>
    $("button.del_comment").click(function(){
       var kind=$(this).attr('kind');
       var id=$(this).attr('name');
       //alert('kind: '+kind+' id: '+id)
       $.post('core/delete.php',{
           kind:'comment',
           id:id
       },function(data,textStatus){
          //alert(data) ;
          //window.location.reload();
		  dlg('留言已删除！');
       });
    });
	var reply=function(){
		//回复按钮的处理程序
		$.post('core/reply_panel.php',{
			   		kind:
			   },function(data,textStatus){
			   }
        });
		$("#reply_dlg").dialog('close');
		//自动进行刷新
		 //window.location.reload();
	}
	var dialogopt={
		modal:true,
		buttons:{
			"回复":reply
		},
		autoOpen: false
	};
	$("#reply_dlg").dialog(dialogopt);	
});

</script>
<script type="text/javascript">
$(function(){
	$(".reply_but").click(function(){
		//回复按钮press后的处理程序
		var reply_to_userid=$(this).attr('replyto');
		var reply_to_name=$(this).attr('replyToName');
		$("#reply_dlg_text").text('reply to '+reply_to_name);
		$("#goodid").val($(this).attr('goodid'));
		$("#fromname").val($(this).attr('fromname'));
		$("#fromid").val($(this).attr('fromid'));
		$("#touserid").val($(this).attr('touserid'));
		$("#reply_dlg").dialog('open');	
		
	});
});
</script>
          
        
        
        
        
        
        
        
        
        
<?php
$help_content=<<<EOD
	 欢迎使用帮助选项：<br />
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