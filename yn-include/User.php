<?php
session_start();
require_once 'Database.php';
//require_once 'yn-register.php';
class User{
    private $id;
    private $user;
    private $arr;
    function set_id($id){
        $this->id=$id;
    }
    function get_user(){
        $str="select * from user where id=$this->id";
        $db=new Database();
        $handle=$db->query($str);
        $this->user =mysql_fetch_object($handle);
    }
    function get_each_user($index){
        $this->user=$this->arr[$index];
    }
    function get_count(){
        return count($this->arr);
    }
    function get_users($indent,$each){
        $arr=array();
        $str="select * from user limit $indent,$each";
        $db=new Database();
        $handle=$db->query($str);
        $i=0;
        while($user=mysql_fetch_object($handle)){
            $this->arr[$i]=$user;
            $i++;
        }
        return $this->arr;
    }
	function get_level_users($level){
		 $arr=array();
        $str="select * from user where level=$level";
        $db=new Database();
        $handle=$db->query($str);
        $i=0;
        while($user=mysql_fetch_object($handle)){
            $this->arr[$i]=$user;
            $i++;
        }
        return $this->arr;
	}
    function get_name(){
        echo $this->user->user_name;
    }
	function return_name(){
        return $this->user->user_name;
	}
    function get_id(){
        return $this->user->id;;
    }
    function get_realname(){
        echo $this->user->real_name;
    }
    function get_sex(){
        echo $this->user->sex;;
    }
    function get_birthday(){
        echo $this->user->birthday;
    }
    function get_photo(){
        echo $this->user->photo;
    }
    function get_studynum(){
        echo $this->user->study_num;
    }
    function get_xiaoqu(){
        echo $this->user->xiaoqu;;
    }
    function get_connect(){
        echo $this->user->connect;
    }
    function get_xueyuan(){
        echo $this->user->xueyuan;
    }
    function get_email(){
        echo $this->user->email;
    }
	function return_mail(){
        return $this->user->email;
	}
    function get_aboutme(){
        echo $this->user->about_me;
    }
    function get_jifen(){
        echo $this->user->jifen;
    }
    function get_pwd(){
        return $this->user->new_pwd;
    }
    function get_level(){
        return $this->user->level;
    }
    function set_level($id,$level){
        $db=new Database();
        return $db->query("update user set level=$level where user_id=$id");
    }
    function login(){
		$user=new User();
	  if($_SESSION['onload']===TRUE){
		$user->set_id($_SESSION['user_id']);
		$user->get_user();
		$level=$user->get_level();
		}
        if($_SESSION['onload']!=TRUE){
            echo "<a href='".$yn_base_path."denglu.php'>登陆</a>";
        }else{
            echo "<a href='".$yn_base_path."yn-admin/denglu_index?level=".$level."'>".$_SESSION['user_name']."</a>&nbsp;&nbsp";
        }
    }

}

?>


<?php


?>