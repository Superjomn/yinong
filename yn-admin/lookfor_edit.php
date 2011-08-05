<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];

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
<?php
//设置id
$lookfor_id=$_GET['id'];
//判定是否为驳回商品的重审申请
$status=$_GET['status'];
//echo $status;

$lookfor->set_id($lookfor_id);
$lookfor->get_lookfor(1, 2);
?>
<?php
	if($status=='back')
		echo "<script type='text/ecmascript' src='js/lookfor_back_edit.js'></script>";
	else
		echo "<script type='text/javascript' src='js/control_panel.js'></script>";
?>
<link type="text/css" rel="stylesheet" href="css/control_panel.css" />
<div id="information" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">求购信息编辑</h3>
        <form>
        <table>
          <tr>
          <!--隐藏相关信息
            userid
            username
          -->
          <div style="display: none">
              <input name="userid" value="<?php echo $lookfor->get_fromid(); ?>"/>
              <input name="username" value="<?php $lookfor->get_fromname(); ?>"/>
              <input name="lookfor_id" value="<?php echo $lookfor_id; ?>"/>
          </div>
              <td><label>求购</label></td><td><input value="<?php echo $lookfor->get_name(); ?>" name="qiugou" /></td>
          </tr>
          <tr>
              <td><label>描述</label></td><td><textarea name="miaoshu" style="height:7em;"><?php $lookfor->get_description(); ?></textarea></td>
          </tr>
          <tr>
              <td><label>标签</label></td><td><input name="biaoqian" value="<?php echo $lookfor->get_tag(); ?>" /></td>
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
            	<button id="edit_save" type="button">
					<?php 
						if($status=='back')
							echo '重审申请';
						else
							echo '保存';
					?>
                </button>&nbsp;&nbsp;       

            </td>
          </tr>
          
        </table>
        </form>
        
    </div><!--end 求购信息-->