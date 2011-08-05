<?php
require_once 'Database.php';
    class Wordpress{
        private $tb;
        private $wp;
        private $arr=array();
        function get_term_id($str){
            $db=new Database();
            $dd="select term_id from yn_terms where slug='$str'";
            //echo $dd;
            $handle=mysql_query($dd);
            $arr=mysql_fetch_object($handle);
            return $arr->term_id;
        }
        function get_wps($termid,$limit){
            $db=new Database();
			$res=array();
            $str=" select object_id from yn_term_relationships where term_taxonomy_id=$termid limit 0,$limit";
			//echo $str;
            $handle=$db->query($str);
			$index=0;
        	while($result=mysql_fetch_object($handle)){
            	$this->arr[$index]=$result->object_id;
           		 $index++;
       		}
        	return $this->arr;
        }
        function get_wp($num){
			 $ID=$this->arr[$num];
			 //echo 'the id is ',$ID;
             $str="select * from yn_posts where ID=$ID";
			 //echo $str;
			 $hd=mysql_query($str);
			 $this->wp=mysql_fetch_object($hd);
			 //echo 'the wp';
			 //print_r( $this->wp);
        }
		function get_count(){
			return count($this->arr);
		}
		function get_id(){
			return $this->wp->ID;
		}
        function get_title(){
            echo $this->wp->post_title;
        }
        function get_except($font_count){
            $str=strip_tags($this->wp->post_content);
			
            echo substr($str, 0,3*$font_count),'[...]';
        }
    }
	/*
	$wp=new Wordpress();
	echo $wp->get_term_id('xiaoyuan');
	$termid=$wp->get_term_id('xiaoyuan');
	print_r($wp->get_wps($termid));
	for($i=0;$i<$wp->get_count();$i++){
		print_r($wp->get_wp($i));
		
		$wp->get_title();
		
	}
		
		
	$wp->get_wp(1);
	$wp->get_title();
	
	//开始取回文章
	//$wp->get_post_ids($termid);
	
*/
?>