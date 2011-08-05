<?php
session_start();
if(isset ($_SESSION['left'])){
    echo $_SESSION['left'];
}else{
    echo 'false';
}

?>
