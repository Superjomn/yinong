<?php
	$id=$_GET['id'];
	switch($level){
		case 1:
			header("location:yn-admin/super_admin");
		break;
		case 2:
			header("location:yn-admin/edit_admin");
		break;
		case 3:
			header("location:yn-admin/");
		break;
		default:
			echo "<p style='font-size:30px;'>Broken Page , Please Check The URL<br/>Or Connect The Author.</p>";	
	}

?>