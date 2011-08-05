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
require_once '../yn-include/Database.php';
require_once '../yn-include/Option.php';
$base=new Base();
$comment=new Comment();
$user=new User();
$good=new Good();
$db=new Database();
$option=new Option();
?>
<?php require 'panel_header.php';?>
	<script type="text/javascript" src="jquery/jquery.select.js"></script>
    

    <div id="summarize" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">全站设置</h3> 
        <table>
        	<tr> 
            	<td>屏蔽校外搜索引擎</td><td><input type="checkbox" id="pingbi" /></td>
            </tr>
            <tr>
                <td>留言同步使用邮件发送</td><td><input type="checkbox" id="mailto" /></td>
            </tr>
            <tr>
                <td>清空二手货信息草稿箱</td><td><button type="button" id="del_belly_draft">确定</button></td>
            </tr>
            <tr>
                <td>删除被驳回二手信息</td><td><button type="button" id="del_belly_back">确定</button></td>
            </tr>
            <tr>
                <td>清空求购信息草稿箱</td><td><button type="button" id="del_lookfor_draft">确定</button></td>
            </tr>
            <tr>
                <td>删除被驳回求购信息</td><td><button type="button" id="del_lookfor_back">确定</button></td>
            </tr>
        </table><div style="clear:both"></div> 
        <hr />
        <button type="button" id="first_but">确认修改</button>
    </div><!--end 求购信息-->
    <script type="text/javascript">
        //删除信息开始
        function del_but(button,kind){
            $(button).click(function(){
                $.post('<?php echo $_SERVER["REQUEST_URI"]; ?>', {
                    'del_kind':kind
                },function(data,textStatus){
                    dlg('信息已经清空！');
                    //console.info(data);
                })
            });
        }
        //checkbo 的处理
        //判断是否被选
        function cbox(name){
            return $(name).attr('checked')==true;
        }
        $(function(){
            del_but('#del_belly_draft','belly_draft');
            del_but('#del_belly_back','belly_back');
            del_but('#del_lookfor_draft','lookfor_draft');
            del_but('#del_lookfor_back','lookfor_back');
            //测试通过 可以清空相关信息
            //对站点配置进行相关处理
            $("#first_but").click(function(){
                var pingbi=cbox('#pingbi')?'on':'off';
                var mailto=cbox('#mailto')?'on':'off';
               $.post('<?php echo $_SERVER["REQUEST_URI"]; ?>', {
                   'peizhi':'first',
                   'pingbi':pingbi,
                   'mailto':mailto
               },function(data,textStatus){
                  dlg('配置已经保存！');
               });

            });
            
        });
    </script>
    
    <div id="summarize" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">前台控制</h3> 
        <table>
        	<tr>
                <td>主页显示二手货信息数</td><td>
                	<select id="index_good_num">
                    	<option value="5">5</option>
                        <option value="6" selected="selected">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>主页求购信息数</td>
                <td>
					<select id="index_lookfor_num">
                        <option value="7">7</option>
                    	<option value="8">8</option>
                        <option value="9" selected="selected">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>                </td>
            </tr>
            <tr>
            	<td>主页图片栏展示数</td>
                <td>
                	<select id="index_pic_num">
                    	<option value="5">5</option>
                        <option value="6" selected="selected">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>首页活跃会员显示数</td>
                <td>
                	<select id="index_user_num">
                    	<option value="7">7</option>
                    	<option value="8">8</option>
                        <option value="9" selected="selected">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                </td>
            </tr>           
        </table><div style="clear:both"></div> 
        <hr />
        <button type="button" id="second_submit">确认修改</button>
        <script type="text/javascript">
            function svalue(id){
                return $(id).getSelectedText();
            }
            
            $(function(){
                $("#second_submit").click(function(){
																		   
                    //开始处理  将相关信息上传
                    $.post('<?php echo $_SERVER["REQUEST_URI"]; ?>', {
                        'peizhi':'second',
                        'index_good_num':svalue('#index_good_num'),
                        'index_lookfor_num':svalue('#index_lookfor_num'),
                        'index_user_num':svalue('#index_user_num'),
                        'index_pic_num':svalue('#index_pic_num')
                    },function(data,textStatus){
                        //console.info(data);
						dlg('主页配置已保存！');
                     });//end post
		});//end click
					
            });//end start
           
	</script>
    </div><!--end 求购信息-->
    <div id="summarize" class="small_panel ui-widget-content ui-corner-all">
    	<h3 class="ui-widget-header ui-corner-all">后台配置</h3> 
        <table>
        	<tr>
            	<td>编辑后台每页二手货信息数</td>
                <td>
                	<select id="back_belly_num">
                    	<option value="7" selected="selected">7</option>
                    	<option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>编辑后台每页求购信息信息数</td>
                <td>
                	<select id="back_look_num">
                    	<option value="7" selected="selected">7</option>
                    	<option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                </td>
            </tr>
        </table><div style="clear:both"></div>

        <hr />
        <button type="button" id="third_submit">确认修改</button>
        <script type="text/javascript">
	   $(function(){
              $("#third_submit").click(function(){
                    $.post('<?php echo $_SERVER["REQUEST_URI"]; ?>', {
                        'peizhi':'third',
                        'back_good_num':svalue('#back_belly_num'),
                        'back_lookfor_num':svalue('#back_look_num')
                    },function(data,textStatus){
                        //console.info(data);
                        dlg('信息已经更爱！');
                    });//end post
              });//end click
           });
	</script>
    </div><!--end 求购信息-->
    <script type="text/javascript">
	 //初始化
	 function setsval(id,value){
             $(id).setSelectedText(value);
         }
         //select 的初始化
         setsval('#index_good_num',"<?php echo $option->get_ind_belly_num(); ?>");
         setsval('#index_lookfor_num',"<?php echo $option->get_ind_lookfor_num();?>");
         setsval('#index_pic_num',"<?php echo $option->get_ind_pic_num(); ?>");
         setsval('#index_user_num',"<?php echo $option->get_ind_user_num();  ?>");
         //后台设置开始
         setsval('#back_belly_num','<?php echo $option->get_back_belly_num();  ?>');
         setsval('#back_look_num','<?php echo $option->get_back_lookfor_num();  ?>');


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
  <?php
    /*
     * 尝试在本页面进行相关程序方面的处理
     */
  //获得需要删除的 信息种类
     $del_kind=$_POST['del_kind'];
     if(isset ($del_kind)){
         //当页面已经传输了值的时候进行处理
         switch($del_kind){
             case 'belly_draft':
                 $str="delete  from goods where status='draft'";
             break;
             case 'belly_back':
                 $str="delete   from goods where status='back'";
             break;
             case 'lookfor_draft':
                 $str="delete   from lookfor where status='draft'";
             break;
             case 'lookfor_back':
                 $str="delete  from lookfor where status='back'";
             break;
         }
         //进行处理
         //echo '<br/><br/>',$str;
         $db->query($str);
     }
     if(isset ($_POST['peizhi'])){
         switch($_POST['peizhi']){
             case 'first':
                 {
               $mailto=$_POST['mailto']  ;
               $pingbi=$_POST['pingbi'];
               /*
                * 屏蔽搜索引擎
                * 自动邮件发送
                */
               $option->set_pingbi($pingbi);
               $option->set_automail($mailto);
             };
             break;
         //第二个框的处理
             case 'second':
                 {
                 //开始对主页的相关选项设置新值
                $option->set_ind_belly_num($_POST['index_good_num']);
                $option->set_ind_lookfor_num($_POST['index_lookfor_num']);
                $option->set_ind_pic_num($_POST['index_pic_num']);
                $option->set_ind_user_num($_POST['index_user_num']);
             }
             break;
             case 'third':
                 {
                 $option->set_back_belly_num($_POST['back_good_num']);
                 $option->set_back_lookfor_num($_POST['back_lookfor_num']);
             }
             break;
         }
     }
     /*
      * 除了按钮外的其他处理
      * 
      */


  ?>
  
    
