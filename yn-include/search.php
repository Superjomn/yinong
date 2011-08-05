<?php
    $db=new Database();
    $base=new Base();
    //开始取回所有栏目
    $arr1=$base->gets("select name from goods where status='on'");
	$arr2=$base->gets("select tag from goods where status='on'");
	$arr3=$base->gets("select name from lookfor where status='on'");
	$arr4=$base->gets("select tag from lookfor where status='on'");
	//删除了重复的值
	$arr=array_merge($arr1,$arr2,$arr3,$arr4);
	//print_r($arr);
	$arr=array_flip(array_flip($arr));
	//print_r($arr);
    function arr_js($arr){
        $str='var suggestions=[';
		$j=0;
        for($i=0;$j<count($arr);$i++){
			if($arr[$i])
				$j++;
            $val=$arr[$i];
            $str.="'$val',";
        }
        $val=$arr[$i];
        $str.="'$val'];";
        return $str;
    }
	//$arr=$arr1+$arr2+$arr3+$arr4;
    echo arr_js($arr);
?>