<?php
require_once 'yn-include/User.php';
require_once 'yn-include/Good.php';
require_once 'yn-include/Comment.php';
require_once 'yn-include/Base.php';
require_once 'yn-include/Lookfor.php';
require_once 'yn-include/Wordpress.php';
require_once 'yn-include/Option.php';
$good=new Good();
$user=new User();
$comment=new Comment();
$base=new Base();
$lookfor=new Lookfor();
$option=new Option();
$wp=new Wordpress();
?>

<?php
//首页lookfor 列表
	function index_lookfor_list($lookfor,$num){
        $lookfor->get_lookfors('on', 0, $num);
        for($i=0;$i<$lookfor->return_count();$i++){
         $lookfor->get_lookfor('lookfors', $i);
?>
           <li><a href="lookfor?id=<?php echo $lookfor->get_id();?>&page_index=lookfor"><?php echo $lookfor->get_name();  ?></a></li>
                   <?php
                    }
                   ?>
<?php				   
	}
?>
<?php
//返回首页图片展示列表
	function index_pic_list($good,$num){
        $good->get_goods('on', 0, $num);
        for($i=0;$i<$good->get_count();$i++){
            $good->get_good('goods', $i);

    ?>
    <img src="<?php $good->get_leftimg();?>" />
<?php
        }
?>
<?php
	}
?>

<?php
	//首页二手货展示列表 返回二手货图片 名称 作者 日期
	function index_good_list($good,$sendto,$num){
	  	 $good->get("select * from goods where sendto='$sendto' and status='on'",0,$num);
         for($i=0;$i<$good->get_count();$i++){
           $good->get_good('goods', $i);
?>
        <li>
           <table><tr><td><img src="<?php $good->get_leftimg();?>"></td><td>
            <h4><a href="good?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();?></a></h4>
             <b><?php $good->get_excerpt(20);
                                                   ?></b>
           <span class="author"><?php $good->get_owner()
                                                    ;?></span></td></tr></table>
         </li>
<?php
	}

}
?>
<?php
	//返回校园动态  li 列表
	function index_dongtai_list($wp,$num){
	  	$wp=new Wordpress();
		$termid=$wp->get_term_id('dongtai');
		$wp->get_wps($termid,$num);
		for($i=0;$i<$wp->get_count();$i++){	
			$wp->get_wp($i);
	   ?>
       	<li><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>"><?php $wp->get_title(); ?></a></li>
       <?php	
		}
	}
	//加强版图片展示	
	function index_roll_img($good,$num){
		$good->get("select * from goods where status='on'",0,$num);
         for($i=0;$i<$good->get_count();$i++){
           $good->get_good('goods', $i);
		?>
		<li> 
				<a href="<?php $good->get_leftimg();?>"><img src="<?php $good->get_leftimg();?>" alt="<?php $good->get_name();?>" /></a> 
				<div class="block"> 
					<h2><?php $good->get_name();?></h2> 
					<small><?php $good->get_date();?></small> 
					
					<p><?php $good->get_excerpt(26);?><br /><a href="good?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good" target="_blank">查看</a> </p> 
				</div> 
			</li> 
	<?php
		}  
	}

?>
<?php
//校园动态
	function index_wp_dongtai($num){
	  	$wp=new Wordpress();
		$termid=$wp->get_term_id('dongtai');
		$wp->get_wps($termid,$num);
		for($i=0;$i<$wp->get_count();$i++){	
			$wp->get_wp($i);
	   ?>
       	<li><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>"><?php $wp->get_title(); ?></a></li>
       <?php	
		}
	
	}
//易农公告
	function index_wp_gonggao(){
	  	$wp=new Wordpress();
		$termid=$wp->get_term_id('gonggao');
		$wp->get_wps($termid,6);
		for($i=0;$i<$wp->get_count();$i++){	
			$wp->get_wp($i);
	   ?>
       	<li><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>"><?php $wp->get_title(); ?></a></li>
       <?php	
		}
	
	}
?>


