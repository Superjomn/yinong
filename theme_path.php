<?php 
	require_once 'yn-include/Option.php';
	$option=new Option();
	$theme_path=$option->get_theme_path();
	$theme_path='yn-content/theme/'.$theme_path.'/';
	define('THEME_PATH',"$theme_path");
?>