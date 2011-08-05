<?php
session_start();
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
require_once 'Database.php';
//转话字符串
//区分普通回复和lookfor回复
$kind=$_POST['kind'];
$goodid=$_POST['goodid'];
function text_p($str)  {
      $arr=explode("\n", $str);
      for($i=0;$i<count($arr);$i++){
          $arr[$i]='<p>'.$arr[$i].'</p>';
      }
      for($j=0;$j<count($arr);$j++){
          $string.=$arr[$j];
      }
      return $string;
  }
switch($kind){
    case 'lookfor':
        $date= date("y-m-j G:i:s");
        $db=new Database();
        $str="insert into comment (goodid,fromname,fromid,comment,status,touserid,date,kind)values($goodid,'$user_name',$user_id,'$comment','on',$touserid,'$date','lookfor')";
        $db->query($str);
    break;
    default:
        $date= date("y-m-j G:i:s");
        $db=new Database();
        $str="insert into comment (goodid,fromname,fromid,comment,status,touserid,date,kind)values($goodid,'$user_name',$user_id,'$comment','on',$touserid,'$date','comment')";
        $db->query($str);
    break;
}

echo $str;
echo text_p($comment);


?>
