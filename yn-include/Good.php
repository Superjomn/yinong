<?php
    require_once 'Database.php';
?>
<?php
class Good{
    private $id;
    private $arr;
    private $good;
	
	
    //初始化
    function set_id($id){
        $this->id=$id;
    }
    //取回单独商品
    function get_good($check,$index){
        if($check=='goods'){
            $this->good=$this->arr[$index];
            return;
        }
        $str="select * from goods where id=$this->id";
        //echo $str;
        $db=new Database();
        $handle=$db->query($str);
        $this->good =mysql_fetch_object($handle);
    }
    function get_count(){
        return count($this->arr);
    }
        //取回多个商品
    function get_goods($status,$offset,$limit){
        $str="select * from goods where status='$status' order by id desc limit $offset,$limit";
		//echo $str;
        $db=new Database();
        $hd=$db->query($str);
        $this->arr=array();
        $index=0;
        while($result=mysql_fetch_object($hd)){
            $this->arr[$index]=$result;
            $index++;
        }
        return $this->arr;
    }
    function get($str,$offset,$limit){
        $string=$str." order by id desc limit $offset,$limit";
       // echo $string;
        $db=new Database();
        $hd=$db->query($string);
        $this->arr=array();
        $index=0;
        while($result=mysql_fetch_object($hd)){
            $this->arr[$index]=$result;
            $index++;
        }
        return $this->arr;
        //echo $string;
    }


    function get_id(){
        return $this->good->id;
    }
    function get_name(){
        echo $this->good->name;
    }
    function get_leftimg(){
        echo $this->good->leftimg;
    }
    function get_fronimg(){
        echo $this->good->fronimg;
    }
    function get_topimg(){
        echo $this->good->topimg;
    }
    function get_backimg(){
        echo $this->good->backimg;
    }
    function get_description(){
        $content=strtr($this->good->description, "^", "'");
        $content=trim($content);
        echo $content;
    }
    function get_sendto(){
        echo $this->good->sendto;
    }
    function return_sendto(){
        return $this->good->sendto;
    }
    function get_price(){
        echo $this->good->price;
    }
    function get_exchangefor(){
        echo $this->good->exchangefor;
    }
    function get_miaoshu(){
        echo $this->good->miaoshu;
    }
    function get_old(){
        echo $this->good->old;
    }
    function get_tag(){
        echo $this->good->tag;
    }
    function get_sort(){
        echo $this->good->sort;
    }
    function get_owner(){
        echo $this->good->owner;
    }
    function get_ownerid(){
        return $this->good->ownerid;
    }
    //excerpt
    function get_excerpt($font_count){
        $str=strip_tags($this->good->description);
        echo substr($str, 0,3*$font_count),'[...]';
    }
	function get_date(){
		echo $this->good->date;
		}
    /*
    function msubstr($str,$start,$len){
        $tmpstr="";
        $strlen=$start+$len;
        for($i=0;$i<$strlen;$i++){
            if(ord(substr($str,$i,1))>0xa0){
                $tmpstr=substr($str,$i,2);
                $i++;
            }else {
                $tmpstr=substr($str,$i,1);
            }
        }
        return $tmpstr;
    }
     *
     */

    //取回相应类别的宝贝 并且倒序排列
    function get_sort_goods($status,$sort,$offset,$limit){
        $str="select * from goods where sort='$sort' and status='$status' order by id desc limit $offset,$limit";
        $db=new Database();
        $hd=$db->query($str);
        $this->arr=array();
        $index=0;
        while($result=mysql_fetch_object($hd)){
            $this->arr[$index]=$result;
            $index++;
        }
        return $this->arr;
    }
    //返回 特定区域 且 类别的goods
     function get_sendto_sort_goods($status,$sendto,$sort,$offset,$limit){
         $str="select * from goods where sendto='$sendto' and  sort='$sort' and status='$status' order by id desc limit $offset,$limit";
        $db=new Database();
        $hd=$db->query($str);
        $this->arr=array();
        $index=0;
        while($result=mysql_fetch_object($hd)){
            $this->arr[$index]=$result;
            $index++;
        }
        return $this->arr;
     }
    //特定用户的商品
    
     
    function good_count(){
        return count($this->arr);
    }
    function get_user_goods($status,$userid,$offset,$limit){
        $str="select * from goods where ownerid=$userid and status='$status' limit $offset,$limit";
        //echo $str;
        $db=new Database();
        $hd=$db->query($str);
        $this->arr=array();
        $index=0;
        while($result=mysql_fetch_object($hd)){
            $this->arr[$index]=$result;
            $index++;
        }
        return $this->arr;
    }

    

}

?>
<?php

/*
    $db=new Database();
    $index=0;
    $handle=$db->query('select name from goods');
    while ($result=mysql_fetch_object($handle)){
        $res[$index]=$result;
        $index++;
    }
    for($i=0;$i<count($res);$i++){
        echo $i.'<br/>';
        echo $res[$i]->name;
    }
    $good=new Good();
    $good->get_goods(0, 1);
    $good->get_good('goods', 0);
    $good->get_name();
    $good->get_id();
    $good->get_description();
    echo $good->good_count();
 * */

/*sort goods的测试

$good->get_sendto_sort_goods('学友火炬', '图书资料', 0, 7);
for($i=0;$i<$good->good_count();$i++){
    $good->get_good('goods', $i);
    $good->get_name();
}
 * 
 */
/*excerpt
$str='你好啊，我来自中国，你们hello 啊';
$good->set_id(6);
$good->get_good('', 0);
$good->get_excerpt(40);
*/


 

    
    
?>
