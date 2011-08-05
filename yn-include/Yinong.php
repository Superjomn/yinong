<?php
/*
 * 关于网站模板的相关函数
 */
class Yinong{
    //此处所有目录均不带 后/
    //主站基准目录
    private $base_path;
    //模板目录
    private $module_path;
    /*
     * 模板初始化
     * 如 session_start()等
     */
    function  __destruct() {
        $this->base_path='http://localhost:8080/yinong';
        $this->module_path=$this->base_path.'/'.'yn-content/theme/chunwei';
    }
    function init(){
        session_start();
    }


    //导入内容的相关方法
    function get_header(){
        require $this->module_path.'/header.php';
    }
    


}

?>