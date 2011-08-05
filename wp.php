<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>wordpress try</title>
</head>

<body>
	<div>
    	<?php require_once'yn-include/Wordpress.php';?>
        <?php
			$wp=new Wordpress();
			$termid=$wp->get_term_id('superjom');
			echo $termid;
	        print_r($wp->get_post_ids(3));
			
		?>
    </div>

</body>
</html>