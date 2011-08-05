<?php
	$id=$_GET['id'];
	switch($level){
		case 3:
			header("location:super_admin");
		break;
		case 2:
			header("location:edit_admin");
		break;
		case 1:
			header("location:index");
		break;
		default:
			echo "<p style='font-size:30px;'>Broken Page , Please Check The URL<br/>Or Connect The Author.</p>";	
	}

?>