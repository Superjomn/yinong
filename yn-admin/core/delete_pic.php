<?php
	$pic_id=$_POST['id'];
	$kind=$_POST['kind'];
if($kind=='delete_all')
{
	delDirAndFile('../upload_pic');
}
	else
{
	$base_path='http://127.0.0.1:8080/yinong/yn-admin/';
	echo $pic_id,"\n\n";
	$del_path='../'.substr($pic_id,strlen($base_path),strlen($pic_id));
	if(file_exists($del_path))
		unlink($del_path);
}
//删除目录下全部文件的函数
function delDirAndFile( $dirName )
{
if ( $handle = opendir( "$dirName" ) ) {
   while ( false !== ( $item = readdir( $handle ) ) ) {
   if ( $item != "." && $item != ".." ) {
   if ( is_dir( "$dirName/$item" ) ) {
   delDirAndFile( "$dirName/$item" );
   } else {
   if( unlink( "$dirName/$item" ) )
   }
   }
   }
   closedir( $handle );
}
}
?>