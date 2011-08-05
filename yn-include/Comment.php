<?php
class Comment{
    private $id;
    private $arr;
    private $comment;

    function set_id($id){
        $this->id=$id;
    }
    //取回单独商品
    function get_comment($check,$index){
        if($check=='comments'){
            $this->comment=$this->arr[$index];
            return $this->comment;
        }
        $str="select * from comment where id=$this->id";
        $db=new Database();
        $handle=$db->query($str);
        $this->comment =mysql_fetch_object($handle);
    }
    function get_comments($status,$offset,$limit){
        $str="select * from comment where status='$status' order by id desc limit $offset,$limit";
        echo $str;
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
    function return_count(){
        return count($this->arr);
    }
    function get_user_comments($status,$kind,$touserid,$offset,$limit){
        $str="select * from comment where touserid=$touserid and status='$status' and kind='$kind' order by id desc limit $offset,$limit";
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
    function get_good_comment($status,$goodid,$offset,$limit){
        
        $str="select * from comment where goodid=$goodid and status='$status' order by id desc limit $offset,$limit";
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
	function gets($str){
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
    //最通用取回函数
    function get($str){
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
        return $this->comment->id;
    }
    function get_comment_num($id,$kind){
        $db=new Database();
        $str="select count(*) from comment where goodid=$id and kind='$kind'";
        //echo $str;
        $hd=$db->query($str);
        $result=mysql_fetch_array($hd);
        return $result[0];
    }
    function get_goodid(){
        return $this->comment->goodid;
    }
    function get_fromname(){
        echo $this->comment->fromname;
    }
    function get_fromid(){
        return $this->comment->fromid;
    }
    function get_cotent(){
        echo $this->comment->comment;
    }
    function get_status(){
        return $this->comment->status;
    }
    function get_touserid(){
        return $this->comment->touserid;
    }
	function get_date(){
		echo $this->comment->date;
	}
    

}

?>
