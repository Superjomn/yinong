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
  <h3 class="ui-widget-header ui-corner-all">上传广告图片</h3>
<?php 
if($_GET['act']=='upload'){ 
if($_POST['upload']=='upload'){ 

$updir ='adv_img/'; 
$uploadfile = $uploaddir . basename($_FILES['file']['name']); 

$_FILES['file']['name']=strtolower($_FILES['file']['name']); 
$tmp_filename=explode(".",$_FILES['file']['name']); 
if($tmp_filename[(count($tmp_filename)-1)]=='jpg' || $tmp_filename[(count($tmp_filename)-1)]=='jpeg'){ 
$up_filename=$updir.md5($_FILES['file']['name'].$_FILES['file']['size']).".".$tmp_filename[(count($tmp_filename)-1)] ; 

if(move_uploaded_file($_FILES['file']['tmp_name'],$up_filename)){ 
list($width, $height, $type, $attr) = getimagesize($up_filename); 
$f1="<img src='$up_filename' id='ImageDrag' width='150'>"; 
echo '<script language="javascript">parent.$("#ImageDragContainer").html("'.$f1.'");</script>'; 
echo "<script>parent.myform.bigpic.value=''</script>";//修改时候直接替换掉原数据 
echo "<script>parent.myform.bigpic.value+='",$up_filename,",",$width,",",$height,"'</script>"; 
echo "<script>location.href='?act=upload'</script>";exit; 
}else{ 
echo "<script>alert('图片上传失败!');location.href='?act=upload'</script>";exit; 
} 
}else{ 
echo "<script>alert('图片上传失败,请注意上传格式，只支持jpg格式图片!');location.href='?act=upload'</script>";exit; 
} 


} 
?>

<div style="margin:0px;padding:0px;font-size:12px;"> 
<FORM ACTION="" METHOD="POST" enctype="multipart/form-data"> 

<input type="file" name="file" id="file" /> 

<input type="submit" name="button" id="button" value="上传" /> 

<input name="upload" type="hidden" id="upload" value="upload" /><input type="hidden" name="MAX_FILE_SIZE" value="3000000" /> 
</FORM> 

</div> 
</body> 
<?php 
exit; 
} 
?> 
<script src="js/jquery.pack.js"></script> 

<form action="upload_ok.php" name="myform"> 
<table width="700" border="0" cellpadding="3" cellspacing="1"> 
<tr> 
<td width="250" valign="top" bgcolor="#FFFFFF"> 
<div id="ImageDragContainer"> 

</div> 

</td> 
<td valign="top" bgcolor="#FFFFFF"> 
<br><br> 
<iframe frameborder=0 style="width:350px;height:50px;padding:0px;border:0px;background:#fff" src="adv_upload?act=upload"></iframe><textarea cols="60" name="bigpic" rows="1" id="IconContainer"></textarea> 
</td> 
</tr> 
</table> 
</form> 
</div>
<style>
#img_tab img{
	width:200px;
}
</style> 
<div id="adv_div" class="small_panel ui-widget-content ui-corner-all showbox">
  <h3 class="ui-widget-header ui-corner-all">广告图片设置</h3>
  	<button type="button" id="set_adv">设为首页广告</button>
	<table id="img_tab">
		<tr><td>选项</td><td>图片</td><td>操作</td></tr>
		<?php
			//print_r(listDirTree('adv_img'));
			$img_arr=listDirTree('adv_img');
			for($i=0;$i<count($img_arr);$i++){
		?>
		<tr>
			<td><input type="radio" name="pic_id" value="<?php echo $img_arr[$i];?>" /></td>
			<td><img src="adv_img/<?php echo $img_arr[$i];?>" /></td>
			<td><button type="button" class="remove" name="<?php echo $img_arr[$i];?>">删除</button></td>
		</tr>
		
			
		<?php
			}
		?>
	
	</table>


</div>
<?php
function listDirTree($dirName=null) {
    if(empty($dirName))exit("IBFileSystem:directoryisempty.");
    if(is_dir($dirName)) {
        if($dh=opendir($dirName)) {
            $tree=array();
            while(($file=readdir($dh))!==false) {
                if($file!="."&&$file!="..") {
                    $filePath=$dirName."/".$file;
                    if(is_dir($filePath)) {
                        $tree[$file]=listDirTree($filePath);
                    } else {
                        $tree[]=$file;
                    }
                }
            }
            closedir($dh);
        } else {
            exit("IBFileSystem:cannotopendirectory$dirName.");
        }
        return$tree;
    } else {
        exit("IBFileSystem:$dirNameisnotadirectory.");
    }
}



?>
<script type="text/javascript">
	$(function(){
    $('tr:even').css({
        'background-color':'#eee'
    });
	//开始进行处理
	$('#set_adv').click(function(){
		$.post('core/adv.php',{
			kind:'set_adv',
			id:$("input[name='pic_id']:checked").val()
		},function(data,textStatus){
			dlg('广告图片已经更新！');
		});
	});
	$("button.remove").click(function(){
		$.post('core/adv.php',{
			kind:'remove',
			id:$(this).attr('name')
		},function(data,textStatus){
			dlg('广告图片已删除！');
		});
	});
});
</script>
<?php require'footer.php';?>


