<?php
require 'Database.php';
$db=new Database();
$handle=$db->query('select name from goods where id =1');
$result=mysql_fetch_object($handle);
echo $result->name;

?>
