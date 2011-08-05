<?php
    require_once './Good.php';
    $good=new Good();
    //单个区域  单个类别的商品列表
    if($kind=='list_field'){
        /*
         * 传入：
         * pageEach
         * pageNum
         * goodNum
         * page
         * str 不带偏移量
         */
        //偏移量的设置
        $pageEach=$_POST['pageEach'];
        $page=$_POST['page'];
        $pageNum=$_POST['pageNum'];
        $str=strtr($_POST['str'], "^", "'");
        $goodNum=$_POST['goodNum'];
        $indent=($page-1)*$pageEach;

       // echo "pageeach $pageEach page $page pagenum $pageNum str $str goodnum $goodNum indent $indent ";
        if($page==$pageNum)
            $pageEach=$goodNum%$pageEach;
        $good->get($str,$indent,$pageEach);
        for($i=0;$i<$good->get_count();$i++){
            $good->get_good('goods', $i);
        ?>
            <li>
            <img src="<?php $good->get_leftimg(); ?>" />
            <h3><a href="good?id=<?php echo $good->get_id(); ?>"><?php $good->get_name();  ?></a></h3>
          <?php $good->get_excerpt(45); ?><br/>
          <span class="author"><a href="user_good_list?id=<?php echo $good->get_ownerid(); ?>"><?php $good->get_owner(); ?></a></span>&nbsp;&nbsp;
          <span class="date">1990-02-27</span><div class="clear"></div>
          </li><div class="clear"></div>
        <?php
        }

    }


?>