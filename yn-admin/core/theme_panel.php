<?php
	require '../../yn-include/Option.php';
	$option=new Option();
?>
<?php
	$theme=$_POST['theme'];
	$kind=$_POST['kind'];
	switch($kind){
		case 'theme_set':
			if($option->set_themepath($theme))
				echo 'ok';			
		break;
			
	}

?>