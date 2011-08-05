<?php
    require_once '../../yn-include/Database.php';
    $db=new Database();
    //传递数据
    $kind=$_POST['kind'];
    $id=$_POST['id'];
    $status=$_POST['status'];
    $str="update $kind set status='$status' where id=$id";
    echo $str;
    $db->query($str);

?>