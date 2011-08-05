<?php
class Database{
    private $handle;
	static $istrue;
    static $dbname;
    static $dbuser;
    static $dbpwd;
    public function __construct() {       //杩炴帴鏁版嵁搴?     
	  
       $this->handle=mysql_connect('localhost','root','root');
       mysql_select_db('yinong');
       mysql_query("SET NAMES UTF8");
   }

   /*鎻掑叆鏁版嵁*/
   function insert($table,$value)  {
      $str="insert into $table values(".$value.")";
      echo $str;
      return mysql_query($str);
   }

   /*淇敼鏁版嵁*/
   function update($table,$name,$value,$judge){
       $str="update ".$table." set ".$name." = ".$value." where ".$judge;
       echo $str;
       return mysql_query($str);
   }
   /*query*/
   function query($str){
	   //echo $this->dbmain;
       return mysql_query($str);
   }


}//end class

?>
