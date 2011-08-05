<?php
    require 'core.php';
    require '../../yn-register.php';
    $user_name=$_POST['user_name'];
    $user_id=$_POST['user_id'];
    if($kind=='new_user')
        new_user($user_name,$real_name,$sex,$study_num,$xueyuan,$xiaoqu,$connect,$birthday,$email,$about_me,$new_pwd,$photo,$yn_base_path);
    else
        update_user($user_id,$user_name,$real_name,$sex,$study_num,$xueyuan,$xiaoqu,$connect,$birthday,$email,$about_me,$new_pwd,$photo,$yn_base_path);
    //定义函数
    function new_user($user_name,$real_name,$sex,$study_num,$xueyuan,$xiaoqu,$connect,$birthday,$email,$about_me,$new_pwd,$photo,$yn_base_path){
        $db=new Database();
        $str="insert into user(user_name,real_name,sex,study_num,xueyuan,xiaoqu,connect,birthday,email,about_me,new_pwd,level)values"
        ."('$user_name','$real_name','$sex','$study_num','$xueyuan','$xiaoqu','$connect','$birthday','$email','$about_me','$new_pwd',1)";
        echo $str;
        $db->query($str);
        if(isset ($photo)){
            $str="update user set photo='$photo' where user_name='$user_name'";
            $db->query($str);
        }else{
            $num=rand(1, 18);
            $photo_path=$yn_base_path."yn-admin/image/host/$num";
            echo $photo_path;
            $str="update user set photo='$photo_path' where user_name='$user_name'";
            $db->query($str);
        }
        echo $str;
    }
    function update_user($user_id,$user_name,$real_name,$sex,$study_num,$xueyuan,$xiaoqu,$connect,$birthday,$email,$about_me,$new_pwd,$photo,$yn_base_path){
        $db=new Database();
        //先删除原有数据
        $str1="delete from user where id=$user_id";
        echo $str1;
        $db->query($str1);
        $str="insert into user(id,user_name,real_name,sex,study_num,xueyuan,xiaoqu,connect,birthday,email,about_me,new_pwd)values"
        ."($user_id,'$user_name','$real_name','$sex','$study_num','$xueyuan','$xiaoqu','$connect','$birthday','$email','$about_me','$new_pwd')";
        echo $str;
        $db->query($str);
        //插入数据  覆盖原有数据
        if(isset ($photo)){
            $str="update user set photo='$photo' where user_name='$user_name'";
            $db->query($str);
        }else{
            $num=rand(1, 18);
            $photo_path=$yn_base_path."yn-admin/image/host/$num";
            echo $photo_path;
            $str="update user set photo='$photo_path' where user_name='$user_name'";
            $db->query($str);
        }
        echo $str;
    }

?>
