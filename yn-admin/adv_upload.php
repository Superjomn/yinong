<?php 
header("Content-Type: text/html; charset=utf-8"); 
@header( "Cache-Control: no-cache, must-revalidate" ); 
@header( "Pragma: no-cache" ); 
@header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 

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
<body style="padding:0px;margin:0px;"> 
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>图片管理</title> 
<script src="js/jquery.pack.js"></script> 
</head> 

<body> 
<form action="upload_ok.php" name="myform"> 
<table width="700" border="0" cellpadding="3" cellspacing="1"> 
<tr> 
<td width="250" valign="top" bgcolor="#FFFFFF"> 
<div id="ImageDragContainer"> 

</div> 

</td> 
<td valign="top" bgcolor="#FFFFFF"> 
<br><br> 
<iframe frameborder=0 style="width:350px;height:50px;padding:0px;border:0px;background:#fff" src="?act=upload"></iframe><textarea cols="60" name="bigpic" rows="1" id="IconContainer"></textarea> 
</td> 
</tr> 
</table> 
<input name="" type="submit" /> 
</form> 
</html> 



