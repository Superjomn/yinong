<?php $filename='pic_panel';?>
<?php require 'panel_header.php';?>
<div id="reply" class="small_panel ui-widget-content ui-corner-all">
	<h3 class="ui-widget-header ui-corner-all">图片</h3> 
    <table>
      <tr><td colspan="4">
            <select><option>删除</option></select>
          </td>
      <tr class="label"><td>查看</td><td>图片</td><td>图片名</td><td>操作</td><td>src</td></tr>
      <tr>
        <td><input type="checkbox" /></td>
        <td><img src="image/2.jpg" /></td>
        <td>324234.gif</td>
        <td><button type="button">删除</button>&nbsp;&nbsp;<button type="button">查看</button></td>
        <td>http://127.0.0.7:8080/yinong/chakan/dd.jpq</td>
      </tr>
    
    </table>



</div>
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