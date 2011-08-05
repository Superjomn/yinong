<?php
require_once 'Database.php';

class Base{
    function get_count($str){
        $db=new Database();
        $handle=$db->query($str);
        $arr=mysql_fetch_array($handle);
        return $arr[0];
    }
    //取回一连串元素
    function gets($str){
        $db=new Database();
        $handle=$db->query($str);
        $res=array();
        $i=0;
        while($arr=mysql_fetch_array($handle)){
            $res[$i]=$arr[0];
            $i++;
        }
        return $res;
    }
    //返回空格隔开语句
    function split_tab($str){
        $arr=split(' ',preg_replace("/([\s]{2,})/","\\1",$str));
	$rel=array();
        $j=0;
        for($i=0;$i<count($arr);$i++){
             if(trim($arr[$i])!=''){
                 $rel[$j]=trim($arr[$i]);
                 $j++;
               }
        }
        return $rel;
    }

    //返回模糊查询语句
    function search($field,$search){
         $rel=$this->split_tab($search);
         $str_lookfor="select * from $field where status='on' and (";
         $stra=$rel[0];
         $str_lookfor.="name like '%$stra%' or tag like  '%$stra%')";
         for($i=0;$i<count($rel);$i++)
            {
                $stra=$rel[$i];
                $str_lookfor.=" and (name like '%$stra%' or tag like  '%$stra%')";
            }
         return $str_lookfor;
      }
      function search_sendto($field,$search,$sendto){
          $str=$this->search($field, $search);
          $str.=" and sendto='$sendto'";
          return $str;
      }
      //返回查询个数
      function search_count($field,$search){
         $rel=$this->split_tab($search);
         $str_lookfor="select count(*) from $field where status='on' and( ";
         $stra=$rel[0];
         $str_lookfor.="name like '%$stra%' or tag like  '%$stra%')";
         for($i=0;$i<count($rel);$i++)
            {
                $stra=$rel[$i];
                $str_lookfor.=" and (name like '%$stra%' or tag like  '%$stra%')";
            }
         return $this->get_count($str_lookfor);
      }
      function date(){
          return date('Y-m-d');
      }

      //将 \n 转化为 html节点
      function text_p($str)  {
        $arr=explode("\n", $str);
      //print_r($arr);
        for($i=0;$i<count($arr);$i++){
            $arr[$i]='<p>'.$arr[$i].'</p>';
         }
        for($j=0;$j<count($arr);$j++){
            $string.=$arr[$j];
         }
          return $string;
     }

}

?>
<?php
/*
    $base=new Base();
    echo $base->get_count("select count(*) from goods");
 * 
 */
?>
