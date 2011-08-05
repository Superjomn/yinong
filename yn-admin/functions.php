<?php
/*these functions are designed by chunwei Yan 
 *on 2010/08/31
 */
 /*引入模板*/
 $basepath='http://localhost:8080/yinong/yn-admin/';
 function get_header(){
	 require 'header.php';
 }
 function get_footer(){
	 require 'footer.php';
 }
 
 /*jquery相关*/
 function get_jquery(){
	 echo "<script type=\"text/javascript\" src=\"".$basepath ."js/jquery.js\"></script>";
 }
 function get_uitheme(){
	 echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"".$basepath."jquery/jquery-ui/development-bundle/themes/base/jquery.ui.all.css\" />";
 }
 function get_ui($name){
	 echo "<script type=\"text/javascript\" src=\"jquery/jquery-ui/development-bundle/ui/jquery.ui.".$name.".js\"></script>";
 }
 function get($name){
	 echo "<script type=\"text/javascript\" src=\"js/".$name.".js\"></script>";
 }
 function is_login(){
	 if(!($_SESSION['onload']===true))
	header('location:../denglu');
 }
 
 
 
?>