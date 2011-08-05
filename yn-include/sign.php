<?php
require_once 'Database.php';
$db=new Database();
if($kind=='check'){
    $str="select count(*) from user where user_name='$name'";
    $result=$db->query($str);
    $arr=mysql_fetch_array($result);
    $num=$arr[0];
    if($num!=0){
        echo 'exit';
    }else {
        echo 'notexit';
    }
}
if($kind=='email'){
    $str="select count(*) from user where email='$email'";
    $result=$db->query($str);
    $arr=mysql_fetch_array($result);
    $num=$arr[0];
    if($num!=0){
        echo 'exit';
    }else {
        echo 'notexit';
    }
}

?>
