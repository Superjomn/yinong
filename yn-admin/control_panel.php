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
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
?>
<?php require 'panel_header.php';?>
    <div id="summarize" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">概况</h3> 
        <table>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where ownerid=$user_id");  ?></td>
            <td>宝贝</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where ownerid=$user_id and status='complete'"); ?></td>
           	<td>成交</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where ownerid=$user_id and status='draft'"); ?></td>
            <td>草稿箱</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from comment where fromid=$user_id and fromname='chunwei'");  ?></td>
          	<td>管理员留言</td>
          </tr>
        </table>
        <table>
          <tr>
            <td><?php echo $base->get_count("select count(*) from comment where fromid=$user_id");  ?></td>
          	<td>留言</td>
          </tr>
          <tr>
              <td><?php echo $base->get_count("select count(*) from goods where ownerid=$user_id and status='on'");  ?></td>
          	<td>获准</td>
          </tr>
          <tr>
            <td><?php echo $base->get_count("select count(*) from goods where ownerid=$user_id and status='hold'");  ?></td>
          	<td>待审</td>
          </tr>
          <tr>
            <td><?php echo $base->get_count("select count(*) from goods where ownerid=$user_id and status='back'");  ?></td>
            <td>驳回</td>
          </tr>
        </table><div class="clear"></div>
    </div><!--end 概况-->
    <!--最近留言-->
    <div id="reply" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">最新留言</h3> 
    	<table>
         <!--导入最新留言-->
          <?php
          /*处理程序 最新留言 取前面6个*/
           $comment->get_user_comments('on','comment',$user_id,0,6);
           for($i=0;$i<$comment->return_count();$i++){
               /*对于每个留言 取相关内容*/
               $comment->get_comment('comments', $i);
               //取得宝贝name
               $good_id=$comment->get_goodid();
               $good->set_id($good_id);
               $good->get_good(2, 1);
               //取得留言人信息
               $user_id=$comment->get_fromid();

           
          ?>
          <tr>
            <td><img src="<?php $user->set_id($user_id);$user->get_user();$user->get_photo(); ?>" style="width:50px; height:50px;" /></td>
            <td>
                <h4><a href="../good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name(); ?></a>&nbsp;&nbsp;<a href="../user_good_list?id=<?php echo $good->get_ownerid(); ?>"><?php $comment->get_fromname(); ?></a></h4>
                <?php $comment->get_cotent()  ?>
            </td>
          </tr>
          <?php
           }
          ?>


        </table>
    </div><!--end reply-->
    
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
                <button id="submit" type="button" style="float:right; margin-right:100px;">发布</button>

            </td>
          </tr>
          
        </table>
        </form>
        
    </div><!--end 求购信息-->
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
    
    
    
