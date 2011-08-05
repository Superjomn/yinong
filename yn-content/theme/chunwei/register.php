<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新用户注册</title>
<link type="text/css" rel="stylesheet" href="yn-include/css/register.css" />


<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>
<link type="text/css" rel="stylesheet" href="yn-include/jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>

<script type="text/javascript" src="yn-include/js/register.js"></script>
<script type="text/javascript">
$(function(){
   $('button') .button();
});
</script>

</head>
<body>
    <div id="outer">
        <div id="header"></div>
        <div id="body">
  <div id="register">
    <div id="logo">
    	<img src="yn-include/image/logo.gif" width="70"  style="margin-left:40px; margin-right:10px;"/>
        <img src="yn-include/image/text.gif" style="margin-bottom:10px;" />
    </div><!--end logo-->
  	<form>
      <table>
      	<tr><td>用户名<br/><input name="user_name" type="text" class="text ui-widget-content ui-corner-all"/>
                <span id="user_name"></span></td></tr>
        <tr><td>真实姓名<br/><input type="text" name="real_name"  class="text ui-widget-content ui-corner-all"/>
          <span id="real_name"></span></td></tr>
        <tr><td>性别<br/><select name="sex">
                    <option value="男" selected>男</option>
                    <option value="女">女</option>
                </select></td></tr>
        <tr><td>学号<br/><input type="text" name="study_num"  class="text ui-widget-content ui-corner-all"/>
          <span id="study_num"></span></td></tr>
        <tr><td>学院<br/><input type="text"  name="xueyuan" class="text ui-widget-content ui-corner-all"/>
            <span id="xueyuan">全称</span></td></tr>
        <tr>
           <td>校区<br/><select name="xiaoqu">
                    <option value="东校区" selected>东校区</option>
                    <option value="西校区">西校区</option>
                </select>
           </td>
        </tr>
      <tr><td>联系方式<br/><input type="text" name="connect" class="text ui-widget-content ui-corner-all"/>
          <span id="connect">便于买家联系</span></td></tr>
          <tr><td>生日<br/><input type="text" name="birthday" id="datepicker"  class="text ui-widget-content ui-corner-all"/>
          <span id="birthday"></span></td></tr>
      <tr><td>邮箱<br/><input type="text" name="email" class="text ui-widget-content ui-corner-all"/>
          <span id="email"></span></td></tr>
      <tr><td>关于自己<br/><textarea name="about_me" class="text ui-widget-content ui-corner-all"></textarea>
          <span id="about_me"></span></td></tr>
      <tr><td>密码<br/><input type="password" name="new_pwd"  class="text ui-widget-content ui-corner-all"/>
          <span id="new_pwd"></span></td></tr>
      <tr><td><input type="password" name="re_pwd"  class="text ui-widget-content ui-corner-all"/>
          <span id="re_pwd"></span></td></tr>      
      <tr><td><button id="submit" type="button">确认</button>&nbsp;&nbsp;<button type="button">重置</button></td></tr>      
      </table>      
    </form>    
  </div><!--end register--><div class="clear"></div>
        </div><!--end body-->
  <div id="bottom"></div>
    </div><!--end outer-->
</body>
</html>