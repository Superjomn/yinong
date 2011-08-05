<?php
    require_once 'Database.php';
    class Option{
        /*
         * get
         * 接受一个 name 值
         * 返回其 value
         */
        function get($str){
            $db=new Database();
            $string="select value from ynoption where name='$str'";
            //echo $string;
            $handle=$db->query($string);
            $arr=mysql_fetch_array($handle);
            return $arr[0];
        }
        /*
         * set
         * 接受 name value 值
         * 修改相应栏目的值
         */
        function set($name,$value){
            $db=new Database();
            $str="update ynoption set value='$value' where name='$name'";
            //echo $str;
            return $db->query($str);
        }
        //取回屏蔽值
        function get_pingbi(){
            return $this->get('pingbi');
        }
		function get_adv(){
			return $this->get('adv');
			}
        function get_automail(){
            return $this->get('automail');
        }
        function get_ind_belly_num(){
            return $this->get('ind_belly_num');
        }

        function get_ind_lookfor_num(){
            return $this->get('ind_lookfor_num');
        }

        function get_ind_pic_num(){
            return $this->get('ind_pic_num');
        }
        function get_ind_user_num(){
            return $this->get('ind_user_num');
        }

        function get_back_belly_num(){
            return $this->get('back_belly_num');
        }

        function get_back_lookfor_num(){
            return $this->get('back_lookfor_num');
        }
		#主题的路径
		function get_theme_path(){
            return $this->get('themepath');
		}
       //-------------------------------------------------------------取回完毕
       //-------------------------------------------------------------设置开始
        
        function set_pingbi($value){
            return $this->set('pingbi',$value);
        }
        function set_automail($value){
            return $this->set('automail',$value);
        }
        function set_ind_belly_num($value){
            return $this->set('ind_belly_num',$value);
        }

        function set_ind_lookfor_num($value){
            return $this->set('ind_lookfor_num',$value);
        }

        function set_ind_pic_num($value){
            return $this->set('ind_pic_num',$value);
        }
        function set_ind_user_num($value){
            return $this->set('ind_user_num',$value);
        }

        function set_back_belly_num($value){
            return $this->set('back_belly_num',$value);
        }

        function set_back_lookfor_num($value){
            return $this->set('back_lookfor_num',$value);
        }
		#主题的路径
		function set_themepath($value){
			return $this->set('themepath',$value);
		}


        
      
    }



?>
<?php
//实验
   /* $option=new Option();
    echo $option->get_pingbi();
    $option->set('pingbi', 'off');
    echo $option->get_pingbi();
    * */
    
?>
