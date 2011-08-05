<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.autocomplete.js"></script>

<?php
	$base_path='http://localhost:8080/yinong';
	$module_path='yn-content/theme/chunwei';
	$this_path=$base_path.'/'.$module_path.'/';
	//echo $this_path;
	function mdpath(){
		$base_path='http://localhost:8080/yinong';
		$module_path='yn-content/theme/chunwei';
		$this_path=$base_path.'/'.$module_path.'/';
		echo $this_path;
	}
?>
<?php 
	//导航树
	$page_index=$_GET['page_index'];
	function daohang($str,$text){
		echo "<li><a href='$str'>$text</a></li>";
	}
	
	
?>
<div id="header">
   <div id="logo">
     <img src="yn-include/image/index_logo.png" style="width:100px" />
   </div>
   <style>
   	 #login a{
		 color:yellow; !important
	 }
   </style>
   <div id="login" style="color:yellow; background-color:#eee;">
   <?php
    $user=new User();
   	$user->login();
        $kind=$_GET['kind'];
   ?>
   </div>
   <ul>
       <li><a href="index.php?page_index=index" id="home">
             <h4>易农主页</h4>
             <b>Home</b>
        </a></li>
        <li><a href="field?kind=fcg&page_index=fcg" id="fcg">
             <h4>学友火炬</h4>
             <b>Fcg</b>
         </a></li>
         <li><a href="field?kind=exc&page_index=exc" id="exc">
             <h4>以物易物</h4>
             <b>Exc</b>
         </a></li>
         <li><a href="field?kind=shg&page_index=shg" id="shg">
             <h4>跳蚤市场</h4>
             <b>Shg</b>
         </a></li>
         <li><a href="blog" id="blog">
             <h4>易农博文</h4>
             <b>Blog</b>
         </a></li>
   </ul>
</div><!--end header-->
<div class="clear"></div>
<style>
.bottom_input{
	width:350px;
	margin-left:auto;
	margin-right:auto;
}
.radio{
	float:left;
	width:100px;
}
.radio input{
}
#header a{
	text-decoration:none;
}
#nav a{
	color:#000;
}
#nav li{
	display:block;
	float:left;
	margin-left:10px;
}
#nav li a:hover{
	color:red;
}
#search_input{
	font-family:"微软雅黑", "黑体";
}
.ui_menu{
	text-align:left;
	font-family:"微软雅黑", "黑体";
}

</style>

<form id="search" method="post" action="search.php">
	<input id='search_input' name="search" type="text" />&nbsp;&nbsp;&nbsp;
    <button type="submit" id="search_button">搜索</button>
    
    
    
   <div class="bottom_input" ><div class="clear"></div>
    	<div class="radio"><input type="radio" name="field"  style="float:left; display:block;"/>学友火炬</div>
    	<div class="radio"><input type="radio" name="field"  style="float:left; display:block;"/>以物易物</div>
    	<div class="radio"><input type="radio" name="field"  style="float:left; display:block;"/>跳蚤市场</div>
        <div class="clear"></div>
   </div><!--end bottom_input-->

</form>
      <div id="roll_info">
        <img src="yn-include/image/icon/Home.png" />
      
      </div>
<div id="homenav" style="color:#000; font-size:18px;">
	<ul id="nav">
    	<?php
            $kind=$_GET['first'];
            $here=$_SERVER["REQUEST_URI"];
            
	    switch($page_index)	{
                case 'index':
                    daohang('index?page_index=index','首页');
                break;
                case 'fcg':
                    daohang('index','首页');
                    daohang('field?kind=fcg&page_index=fcg', '学友火炬');
                break;
                case 'exc':
		    daohang('index','首页');
                    daohang('field?kind=exc&page_index=exc','以物易物');
                break;
                case 'shg':
		    daohang('index','首页');
                    daohang('field?kind=shg&page_index=field', '跳蚤市场');
                break;
                case 'good':
                    {
                     daohang('index','首页');
                     switch ($kind){
                        case 'fcg':
                              daohang('field?kind=fcg&page_index=fcg', '学友火炬');
                         break;
                         case 'exc':
                              daohang('field?kind=exc&page_index=exc','以物易物');
                         break;
                         case 'shg':
                            daohang('field?kind=shg&page_index=field', '跳蚤市场');
                         break;
                       }
                         daohang("$here", '宝贝展示');
                    }
		break;
            //市场中的二手货列表
                case 'good_list':
                   {
                    daohang('index','首页');
                //市场
                     switch ($kind){
                        case 'fcg':
                              daohang('field?kind=fcg&page_index=fcg', '学友火炬');
                         break;
                         case 'exc':
                              daohang('field?kind=exc&page_index=exc','以物易物');
                         break;
                         case 'shg':
                            daohang('field?kind=shg&page_index=field', '跳蚤市场');
                         break;
                       }
                    daohang("$here", '宝贝列表');
                   }
              break;
            //求购信息
              case 'lookfor':
                  {
                  daohang('index','首页');
                  daohang("$here",'求购信息');
              }
              break;
              case 'lookfor_list':
                  {
                  daohang('index','首页');
                  daohang("$here",'求购信息列表');
              }            
            }
		
        ?>
    	
    </ul>
</div>
<script type="text/javascript">
	$(function() {
		$(function(){
			$('button').button();
		});
		<?php require('yn-include/search.php'); ?>
		$( "#search_input" ).autocomplete({
			source: suggestions
		});
	});

</script>   

