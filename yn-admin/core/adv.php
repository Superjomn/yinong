<?php
	require '../../yn-include/Database.php';
	$db=new Database();
	$kind=$_POST['kind'];
	$id=$_POST['id'];
	if($kind=='set_adv'){
		if(file_exists('../adv_img/'.$id))
			$db->query("update ynoption set value='$id' where name='adv'");
	}else
	if($kind='remove')
	{
		if(file_exists('../adv_img/'.$id))
			unlink('../adv_img/'.$id);
	}

	
?>