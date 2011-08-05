<?php
class Lookfor{
    private $id;
    private $arr;
    private $lookfor;

    function set_id($id){
        $this->id=$id;
    }
    //取回单独商品
    function get_lookfor($check,$index){
        if($check=='lookfors'){
            $this->lookfor=$this->arr[$index];
            return $this->lookfor;
        }
        $str="select * from lookfor where id=$this->id";
        $db=new Database();
        $handle=$db->query($str);
        $this->lookfor =mysql_fetch_object($handle);
    }
    function get_lookfors($status,$offset,$limit){
        $str="select * from lookfor where status='$status' order by id desc limit $offset,$limit";
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
    /*
     * 传入查询命令行
     * 自动将结果保留到对象数组中
     */
    function get($str,$indent,$limit){
       // echo $str;
        $string=$str." limit $indent,$limit";
        $db=new Database();
        $hd=$db->query($string);
        $this->arr=array();
        $index=0;
        while($result=mysql_fetch_object($hd)){
            $this->arr[$index]=$result;
            $index++;
        }
        return $this->arr;
    }

    function return_count(){
        return count($this->arr);
    }
    function get_user_lookfors($status,$touserid,$offset,$limit){
        $str="select * from lookfor where fromid=$touserid and status='$status' order by id desc limit $offset,$limit";
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

    //取得摘要
    function get_excerpt($font_count){
        $str=strip_tags($this->lookfor->description);
        echo substr($str, 0,3*$font_count),'[...]';
    }
    
    function get_good_all_lookfor($status,$offset,$limit){
        
        $str="select * from lookfor where status='$status' order by id desc limit $offset,$limit";
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

    //---------------------------------------获得函数----------------------------
    function get_id(){
        return $this->lookfor->id;
    }
    function get_fromname(){
        echo $this->lookfor->fromname;
    }
    function get_fromid(){
        return $this->lookfor->fromid;
    }
   function get_name(){
        return $this->lookfor->name;
    }
    function get_description(){
        echo $this->lookfor->description;
    }
    function get_tag(){
        return $this->lookfor->tag;
    }
    function get_sort(){
        return $this->lookfor->sort;
    }
    function get_status(){
        return $this->lookfor->status;
    }
    function get_date(){
        echo $this->lookfor->date;
    }   
}

?>
<?php
	/*使用实例*/
	/*
	 $lookfor->get_user_lookfors('on',$user_id,0,6);
    for($i=0;$i<$lookfor->return_count();$i++){
       $lookfor->get_lookfor('lookfors', $i);
        $lookfor->get_name();
        $lookfor->get_fromname();
    }
	*/


?>