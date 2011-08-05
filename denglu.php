<?php
session_start();
if(file_exists('yn-include/install/yn-config.php') )
{
	$pag='denglu';
	require('ever.php');
}
else
	header("location:yn-include/install");

?>