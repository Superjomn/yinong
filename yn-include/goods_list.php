<?php
    require_once './Good.php';
    require_once './User.php';
    require_once './Lookfor.php';
    require_once './Comment.php';
    $good=new Good();
    $user=new User();
    $lookfor=new Lookfor();
    $comment=new Comment();
    //单个区域  单个类别的商品列表
    if($kind=='good_field'){
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
            <h3><a href="good?id=<?php echo $good->get_id(); ?>" target="_blank"><?php $good->get_name();  ?></a></h3>
          <?php $good->get_excerpt(45); ?><br/>
          <span class="author"><a href="user_good_list?id=<?php echo $good->get_ownerid(); ?>" target="_blank"><?php $good->get_owner(); ?></a></span>&nbsp;&nbsp;
          <span class="date"><?php   ?></span><div class="clear"></div>
          </li><div class="clear"></div>
        <?php
        }

    }//end if
    else
    //求购信息开始
    if($kind=='lookfor_field'){
        $pageEach=$_POST['pageEach'];
        $page=$_POST['page'];
        $pageNum=$_POST['pageNum'];
        $str=strtr($_POST['str'], "^", "'");
        $goodNum=$_POST['goodNum'];//此处应该为 lookforNum
        $indent=($page-1)*$pageEach;
       // echo "pageeach $pageEach page $page pagenum $pageNum str $str goodnum $goodNum indent $indent ";
        //对页码相关的处理
        if($page==$pageNum)
            $pageEach=$goodNum%$pageEach;
        //$good->get($str,$indent,$pageEach);
        $lookfor->get($str,$indent,$pageEach);
        for($i=0;$i<$lookfor->return_count();$i++){
            $lookfor->get_lookfor('lookfors', $i);
            //发布者的信息
            $user_id=$lookfor->get_fromid();
            $user->set_id($user_id);
            $user->get_user();
        ?>
            <li>
                <img src="<?php $user->get_photo(); ?>" />
                <h3><a href="lookfor?id=<?php echo $lookfor->get_id(); ?>" target="_blank"><?php echo $lookfor->get_name();  ?></a></h3>
          <?php $lookfor->get_excerpt(45); ?><br/>
          <span class="author"><a href="user_good_list?id=<?php echo $lookfor->get_fromid(); ?>" target="_blank"><?php $lookfor->get_fromname(); ?></a></span>&nbsp;&nbsp;
          <span class="date"><?php $lookfor->get_date();?></span><div class="clear"></div>
          </li><div class="clear"></div>
        <?php
        }
    }else
	if($kind=='lookfor_all_search')
	{
		$pageEach=$_POST['pageEach'];
        $page=$_POST['page'];
        $pageNum=$_POST['pageNum'];
        $str=strtr($_POST['str'], "^", "'");
        $goodNum=$_POST['goodNum'];//此处应该为 lookforNum
        $indent=($page-1)*$pageEach;
       // echo "pageeach $pageEach page $page pagenum $pageNum str $str goodnum $goodNum indent $indent ";
        //对页码相关的处理
        if($page==$pageNum)
            $pageEach=$goodNum%$pageEach;
        //$good->get($str,$indent,$pageEach);
        $lookfor->get($str,$indent,$pageEach);
        for($i=0;$i<$lookfor->return_count();$i++){
            $lookfor->get_lookfor('lookfors', $i);
            //发布者的信息
            $user_id=$lookfor->get_fromid();
            $user->set_id($user_id);
            $user->get_user();
        ?>
           <tr>
            <td><a href="lookfor?id=<?php echo $lookfor->get_id(); ?>" target="_blank"><?php echo $lookfor->get_name();  ?></a></td>
            <td><?php $lookfor->get_date();?></td>
            <td class="reply_num"><?php
             $id=$lookfor->get_id();
             	echo $comment->get_comment_num($id,'lookfor');
            ?></td>
          </tr>
        
            
 <?php
        }
}//end if
 ?>