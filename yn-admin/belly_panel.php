<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];

$filename='belly_panel';
require 'panel_header.php';
require_once '../yn-include/core.php';

$base=new Base();
$comment=new Comment();
?>

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
a.belly_name{
	color:blue;
}

</style>
<div id="cj_panel" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">成交宝贝</h3>
  <button type="button" id="delete1">删除</button>
  
  <table>

    <tr class="table_topper"><td align="center">选择</td><td>宝贝</td><td>发布地点</td></tr>
    <?php
	   $good->get_user_goods('comp', $user_id, 0, 100);
           for($i=0;$i<$good->good_count();$i++){
             print_r( $good->get_good('goods', $i));
     ?>
    <tr>
        <td align="left"><input type="checkbox" name="complete_check" value="<?php echo $good->get_id(); ?>" /></td>
        <td><a class="belly_name" href="../good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name(); ?></a></td>
        <td><?php $good->get_sendto(); ?></td>
    </tr>
    <?php
           }
     ?>
  </table>
        
</div> <!--end cjbelly-->

<div id="zjbelly" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">在架商品</h3>

  <table>
      <button type="button" id="zaijia">删除</button>
     
    <tr class="table_topper"><td>选择</td><td>宝贝</td><td>操作</td><td>发布地点</td><td>最新留言</td></tr>
     <?php
	   $good->get_user_goods('on', $user_id, 0, 100);
           for($i=0;$i<$good->good_count();$i++){
             print_r( $good->get_good('goods', $i));
      ?>
    <tr>
        <td><input type="checkbox" name="on_belly" value="<?php echo $good->get_id(); ?>" /></td>
        <td><a href="../good?id=<?php echo $good->get_id(); ?>"><?php echo $good->get_name(); ?></a></td>
        <td><button class="a" hr="belly_edit_panel?good_id=<?php echo $good->get_id(); ?>" type="button">编辑</button>&nbsp;
            <button class="status" status="comp" kind="goods" ynid="<?php echo $good->get_id();  ?>" type="button">成交</button>
        	
        </td>
        <td><?php $good->get_sendto();  ?></td>
      <td class="reply_num"><a href="#"><?php
                                            $goodid=$good->get_id();
                                            $str="select count(*) from comment where goodid=$goodid";
                                            //echo $str;
                                            echo $base->get_count($str)
                                        ?></a></td>
    </tr>
    
<?php
           }
?>
  </table>  
  
</div><!--end zjbelly-->
<div id="bhbelly" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">驳回商品</h3>
  <button type="button" id="bohui">删除</button>
  <table>
    <tr class="table_topper"><td>选择</td><td>宝贝</td><td>操作</td><td>发布地点</td></tr>
     <?php
	   $good->get_user_goods('back', $user_id, 0, 100);
           for($i=0;$i<$good->good_count();$i++){
             $good->get_good('goods', $i);
      ?>
  	<tr>
            <td><input type="checkbox" name="bohui_check" value="<?php echo $good->get_id(); ?>" /></td>			
            <td>
                <a href="../good?id=<?php echo $good->get_id(); ?>"><?php echo $good->get_name(); ?></a>
            </td>
            <td>
                <button type="button" class="delete" name="<?php echo $good->get_id(); ?>" kind='good'>删除</button>&nbsp;
                <button class="a" hr="belly_edit_panel?good_id=<?php echo $good->get_id(); ?>" type="button">编辑</button>
            </td>
             <td><?php $good->get_sendto(); ?></td>
    </tr>  	
    <?php
           }
    ?>
  </table>

</div><!--end zjbelly-->

<!--草稿箱-->
<div id="zjbelly" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">草稿箱</h3>

  <table>
      <button type="button" id="zaijia">删除</button>
     
    <tr class="table_topper"><td>选择</td><td>宝贝</td><td>操作</td><td>发布地点</td></tr>
     <?php
	   $good->get_user_goods('draf', $user_id, 0, 100);
           for($i=0;$i<$good->good_count();$i++){
             print_r( $good->get_good('goods', $i));
      ?>
    <tr>
        <td><input type="checkbox" name="on_belly" value="<?php echo $good->get_id(); ?>" /></td>
        <td><a href="../good?id=<?php echo $good->get_id(); ?>"><?php echo $good->get_name(); ?></a></td>
        <td><button type="button" class="delete" name="<?php echo $good->get_id(); ?>" kind='good'>删除</button>
        &nbsp;<button class="a" hr="belly_edit_panel?good_id=<?php echo $good->get_id(); ?>" type="button">编辑</button></td>
        <td><?php $good->get_sendto();  ?></td>      
    </tr>
    
<?php
           }
?>
  </table>  
  
</div><!--end zjbelly-->

<script type="text/javascript">
	$(function(){
    /*
     * 对class 为 delete 的按钮起作用
     */
    //标准 <button type="button" class="delete" name="" kind='lookfor'>删除</button>
    $("button#delete1").click(function(){
       
       //alert('kind: '+kind+' id: '+id)
	   var kind='goods';
	   $("[name=complete_check]").each(function()
		{
			if($(this).attr('checked')){
				var id=$(this).val();
				$.post('core/delete.php',{
          		 kind:kind,
           		id:id
      			 },function(data,textStatus){
          		//alert(data) ;               
       			});				
			}
		});
	   dlg('宝贝信息已删除！');
//	   window.location.reload();
       
    });
    //------------------------------------------------------------------对1框处理完毕----
    $("button#bohui").click(function(){

       //alert('kind: '+kind+' id: '+id)
	   var kind='goods';
	   $("[name=bohui_check]").each(function()
		{
			if($(this).attr('checked')){
				var id=$(this).val();
				$.post('core/delete.php',{
          		 kind:kind,
           		  id:id
      			 },function(data,textStatus){
          		  //alert(data) ;
       			});
			}
		});
	   dlg('宝贝信息已经删除！');
	   //window.location.reload();

    });
    //-------------------------------------------------------------------在架商品删除处理
     $("button#zaijia").click(function(){

       //alert('kind: '+kind+' id: '+id)
	   var kind='goods';
	   $("[name=on_belly]").each(function()
		{
			if($(this).attr('checked')){
				var id=$(this).val();
				$.post('core/delete.php',{
          		 kind:kind,
           		  id:id
      			 },function(data,textStatus){
          		//alert(data) ;
       			});
			}
		});
	   dlg('宝贝信息已删除！');
	  // window.location.reload();

    });
});
//样式控制
$(function(){
    $('tr:even').css({
        'background-color':'#eee'
    })
});
</script>
<script type="text/javascript" src="js/delete.js"></script>
<script type="text/javascript" src="js/complete.js"></script>

<script type="text/javascript">
    $(function(){
         del('button.delete','goods','name');
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
