<?php
    /*
     * 设计
     * 传入参数： kind id
     */
     $kind=$_POST['kind'];
     $id=$_POST['id'];
     require_once '../../yn-include/Database.php';
     $db=new Database();
     //发展为
     $str="update $kind set status='on' where id=$id";
     //echo $str;
     $db->query($str);
     //echo 'delete it';
?>