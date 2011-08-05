<?php
//导入安装信息
require('install/yn-config.php');
class Database{
    private $handle;
    public function __construct() {
       //连接数据库
       $this->handle=mysql_connect(DBMAIN,DBUSERNAME,DBPWD);
       mysql_select_db('yinong');
       mysql_query("SET NAMES UTF8");
   }

   /*插入数据*/
   function insert($table,$value)  {
      $str="insert into $table values(".$value.")";
      //echo $str;
      return mysql_query($str);
   }

   /*修改数据*/
   function update($table,$name,$value,$judge){
       $str="update ".$table." set ".$name." = ".$value." where ".$judge;
       //echo $str;
       return mysql_query($str);
   }
   /*query*/
   function query($str){
       return mysql_query($str);
   }


}//end class

?>
