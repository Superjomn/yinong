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
require_once '../yn-include/Option.php';
$option=new Option();

$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$lookfor=new Lookfor();
?>
<?php $filename='pic_panel';?>
<?php require 'panel_header.php';?>
<style>
table{
	width:70%;
}
#information table{
	width:100%;
}
#information input{
	padding:3px;
	width:90%;
}
#information textarea{
	width:90%;
	height:3em;
}
#information td{
	padding-top:5px;
	padding-bottom:5px;
}
#information label{
	display:block;
	text-align:center;
	font-weight:bold;
}
.reply_num{
	color:red;
	font-weight:bold;
}
.lookfor_name a{
	color:blue;
	font-weight:bold;
}
.lookfor_name a:hover{
	color:red;
}
</style>
<!--删除模块-->
<script type="text/javascript" src="js/delete.js"></script>
<script type="text/javascript">
    $(function(){
         del('button.delete','lookfor','name');
    });
</script>

<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">求购信息（已通过）</h3> 
    <table>
      <tr class="label"><td>名称</td><td>创建日期</td><td>操作</td><td>回复数</td></tr>
      <?php
	   $lookfor->get_user_lookfors('on',$user_id,0,10);
        for($i=0;$i<$lookfor->return_count();$i++){
          $lookfor->get_lookfor('lookfors', $i);
      ?>
      <tr><?php //echo $lookfor->get_id();?>
          <td class="lookfor_name"><a href="../lookfor?id=<?php echo $lookfor->get_id();  ?>"><?php echo $lookfor->get_name(); ?></a></td>
          <td><?php $lookfor->get_date(); ?></td>
          <td><button type="button" class="delete" name="<?php echo $lookfor->get_id(); ?>" kind='lookfor'>删除</button></td>
        <td class="reply_num"><?php
             $id=$lookfor->get_id();
             echo $comment->get_comment_num($id,'lookfor')
            ?></td>
      </tr>
    <?php
	}
	?>
    </table>
</div>
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">草稿箱</h3> 
    <table>
      <tr class="label"><td>名称</td><td>创建日期</td><td>操作</td></tr>
      <?php
	   $lookfor->get_user_lookfors('draft',$user_id,0,10);
        for($i=0;$i<$lookfor->return_count();$i++){
          $lookfor->get_lookfor('lookfors', $i);
      ?>
      <tr><?php //echo $lookfor->get_id();?>
          <td class="lookfor_name"><a href="../lookfor?id=<?php echo $lookfor->get_id();  ?>"><?php echo $lookfor->get_name(); ?></a></td>
          <td><?php $lookfor->get_date(); ?></td>
          <td>
          	<button type="button" class="a" hr="lookfor_edit?id=<?php echo $lookfor->get_id();?>">编辑</button>
          &nbsp;
          <button type="button" class="delete" name="<?php echo $lookfor->get_id(); ?>" kind='lookfor'>删除</button>
          </td>
        
      </tr>
    <?php
	}
	?>
    </table>
</div>
<!--求购信息-->
<div id="information" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">快速发布</h3>
        <form>
        <table>
          <tr>
            <td><label>求购</label></td><td><input name="qiugou" /></td>
          </tr>
          <tr>
          	<td><label>描述</label></td><td><textarea name="miaoshu"></textarea></td>
          </tr>
          <tr>
          	<td><label>标签</label></td><td><input name="biaoqian" /></td>
          </tr>
          <tr>
          	<td><label>类别</label></td>
                <td>
                    <select name="leibie">
                         <option value="图书资料" selected>图书资料</option>
                         <option value="文具用品">文具用品</option>
                         <option value="电脑配件">电脑配件</option>
                         <option value="电子产品">电子产品</option>
                         <option value="体育娱乐">体育娱乐</option>
                         <option value="生活/女生专区">生活/女生专区</option>
                    </select>
                </td>
          </tr>
          <tr>
          	<td></td>
            <td>
            	<button id="draft_save" type="button">保存草稿</button>&nbsp;&nbsp;
                <button type="reset">重置</button>        
                <button id="lookfor_submit" type="button" style="float:right; margin-right:100px;">发布</button>

            </td>
          </tr>
          
        </table>
        </form>
        
    </div><!--end 求购信息-->



<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">被驳回</h3> 
    <table>
      <tr class="label"><td>选项</td><td>名称</td><td>创建日期</td><td>操作</td></tr>
      <?php
	   $lookfor->get_user_lookfors('back',$user_id,0,50);
        for($i=0;$i<$lookfor->return_count();$i++){
          $lookfor->get_lookfor('lookfors', $i);
      ?>
      <tr>
      	<button type="button">删除</button>
        <td><input type="checkbox" /></td>
        <td class="lookfor_name"><a href="../lookfor?id=<?php echo $lookfor->get_id();  ?>"><?php echo $lookfor->get_name(); ?></a></td>
        <td><?php $lookfor->get_date();?></td>
        <td>
            	<button type="button" class="a" hr="lookfor_edit?id=<?php echo $lookfor->get_id();?>">编辑</button>
            &nbsp;
            <button type="button" class="delete" name="<?php echo $lookfor->get_id(); ?>" kind='lookfor'>删除</button>
            </td>
      </tr>
      <?php
        }
      ?>
    
    </table>
</div>
<script type="text/javascript">
//求购信息
$(function(){
              //草稿
              $("#draft_save") .click(function(){
              $.post("core/qiugou.php",{
                       status:'draft',
                       name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                //alert(data);
				dlg('求购信息已保存至草稿箱！');
             });
			  
             });
			  
			  
             //发布
             $("#lookfor_submit") .click(function(){
              $.post("core/qiugou.php",{
                        status:'on',
                       name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                //alert(data);
				dlg('求购信息已发布！');
             });
           });
           //修改信息
           $("#edit_save") .click(function(){
              $.post("core/qiugou_edit.php",{
                      status:'on',
                      id:$("[name=lookfor_id]").val(),
                      userid:$("[name=userid]").val(),
                      username:$('[name=username]').val(),
                      name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                //alert(data);
				dlg('求购信息已更改！');
             });
           });
		   //
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