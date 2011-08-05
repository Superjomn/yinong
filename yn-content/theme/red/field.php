<?php
session_start();
$kind=$_GET['kind'];
//定义域
$sendto="";
switch ($kind){
    case 'fcg':
        $sendto='学友火炬';
    break;
    case 'exc':
        $sendto='以物易物';
    break;
    case 'shg':
        $sendto='跳蚤市场';
    break;
    default:
        $sendto='404';
}


require_once 'yn-include/Database.php';
require_once 'yn-include/User.php';
require_once 'yn-include/Good.php';
require_once 'yn-include/Base.php';
//建立对象
$good=new Good();
$user=new User();
$base=new Base();
$db=new Database();
?>
<?php require'functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $sendto; ?></title>
<script type="text/javascript" src="yn-include/jquery/jquery.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="yn-include/jquery/jquery-ui/development-bundle/ui/jquery.ui.button.js"></script>

<?php get_eve('fcg');?>

<script type="text/javascript">
$(function(){
	$('button').button();
	$('.small_bar li:even').addClass('li_even');
	
	$('.small_bar li').hover(
		 function(){
			 $(this).addClass('li_over');
		 },
		 function(){
			 $(this).removeClass('li_over');
		 }	
	);
});

</script>
</head>

<body>
  <div id="wrapper" style="border:none;">
  <?php require'header.php';?><div class="clear"></div>
  <!--********************************************图书/文具用品*******************-->
    <div id="elec" class="small_bar ui-widget-content ui-corner-all">
      <h3 class="bar_h ui-widget-header ui-corner-all"><a href="goods_list.php?first=<?php
	  $kind=$_GET['kind'];
	  echo $kind;?>&second=lei1&page_index=good_list">图书/文具用品</a></h3> 
      <ul class="small_ul">
          <!--电脑配件-->
          <?php
            $good->get_sendto_sort_goods('on',$sendto,'图书资料',0, 3);
            for($i=0;$i<$good->good_count();$i++){
                $good->get_good('goods', $i);
          ?>
          <li style="text-align: left;">
            <table><tr><td><img src="<?php $good->get_leftimg();  ?>" /></td><td>
            <h3><a href="good.php?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();   ?></a></h3>
            <?php $good->get_excerpt(45);  ?><br/>
            <span class="author"><a href="user_good_list?id=<?php echo $good->get_ownerid(); ?>"><?php $good->get_owner();  ?></a></span>&nbsp;&nbsp;
            <span class="date"><?php $good->get_date();?></span></td></tr></table><div class="clear"></div>
        </li>
          <div class="clear"></div>
          <?php
            }
            ?>
          <!--电子产品-->
          <?php
            $good->get_sendto_sort_goods('on',$sendto,'文具用品',0, 2);
            for($i=0;$i<$good->good_count();$i++){
                $good->get_good('goods', $i);
          ?>
          <li style="text-align: left;">
            <table><tr><td><img src="<?php $good->get_leftimg();  ?>" /></td><td>
            <h3><a href="good.php?id=<?php echo  $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();   ?></a></h3>
            <?php $good->get_excerpt(45);  ?><br/>
            <span class="author"><a href="user_good_list?id=<?php echo $good->get_ownerid(); ?>"><?php $good->get_owner();  ?></a></span>&nbsp;&nbsp;
            <span class="date">1990-02-27</span></td></tr></table><div class="clear"></div>
        </li>
          <div class="clear"></div>
          <?php
            }
            ?>
        
        <div class="clear"></div>
      </ul>
    </div>
<!--***********************************************电脑/电子配件********************************-->
    <div id="elec" class="small_bar ui-widget-content ui-corner-all">
      <h3 class="bar_h ui-widget-header ui-corner-all"><a href="goods_list.php?first=<?php echo $kind;?>&second=lei2&page_index=good_list">电子/电脑配件</a></h3> 
      <ul class="small_ul">
        <!--电脑配件-->
        <?php
            $good->get_sendto_sort_goods('on',$sendto,'电脑配件',0, 3);
            for($i=0;$i<$good->good_count();$i++){
                $good->get_good('goods', $i);
          ?>
          <li style="text-align: left;">
            <table><tr><td><img src="<?php $good->get_leftimg();  ?>" /></td><td>
            <h3><a href="good.php?id=<?php echo  $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();   ?></a></h3>
            <?php $good->get_excerpt(45);  ?><br/>
            <span class="author"><a href="user_good_list?id=<?php echo $good->get_ownerid(); ?>"><?php $good->get_owner();  ?></a></span>&nbsp;&nbsp;
            <span class="date">1990-02-27</span></td></tr></table><div class="clear"></div>
        </li>
          <div class="clear"></div>
          <?php
            }
            ?>
        <!--电子产品-->
       <?php
            $good->get_sendto_sort_goods('on',$sendto,'电子产品',0, 2);
            for($i=0;$i<$good->good_count();$i++){
                $good->get_good('goods', $i);
          ?>
          <li style="text-align: left;">
            <table><tr><td><img src="<?php $good->get_leftimg();  ?>" /></td><td>
            <h3><a href="good.php?id=<?php echo  $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();   ?></a></h3>
            <?php $good->get_excerpt(45);  ?><br/>
            <span class="author"><a href="user_good_list?id=<?php echo $good->get_ownerid(); ?>"><?php $good->get_owner();  ?></a></span>&nbsp;&nbsp;
            <span class="date">1990-02-27</span></td></tr></table><div class="clear"></div>
        </li>
          <div class="clear"></div>
          <?php
            }
            ?>
        
        <div class="clear"></div>
      </ul>
    </div>
    <div class="clear"></div>
    <!--广告 -->
    <div id="adv">
       <img src="yn-include/image/adv.gif" />
    </div><!--end adv-->
  <!--******************************************体育娱乐相关***********************-->
    <div id="elec" class="small_bar ui-widget-content ui-corner-all">
      <h3 class="bar_h ui-widget-header ui-corner-all"><a href="goods_list.php?first=<?php echo $kind;?>&second=lei3&page_index=good_list">体育/娱乐相关</a></h3> 
      <ul class="small_ul">
        <?php
            $good->get_sendto_sort_goods('on',$sendto,'体育娱乐',0, 5);
            for($i=0;$i<$good->good_count();$i++){
                $good->get_good('goods', $i);
          ?>
          <li style="text-align: left;">
            <table><tr><td><img src="<?php $good->get_leftimg();  ?>" /></td><td>
            <h3><a href="good.php?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();   ?></a></h3>
            <?php $good->get_excerpt(45);  ?><br/>
            <span class="author"><a href="#"><?php $good->get_owner();  ?></a></span>&nbsp;&nbsp;
            <span class="date">1990-02-27</span></td></tr></table><div class="clear"></div>
        </li>
          <div class="clear"></div>
          <?php
            }
            ?>
        <div class="clear"></div>
      </ul>
    </div>
<!--**********************************生活用品/其他********************************** -->
    <div id="elec" class="small_bar ui-widget-content ui-corner-all">
      <h3 class="bar_h ui-widget-header ui-corner-all"><a href="goods_list.php?first=<?php echo $kind;?>&second=lei4&page_kind=good_list">生活/女生专区</a></h3> 
      <ul class="small_ul">
        <?php
            $good->get_sendto_sort_goods('on',$sendto,'生活/女生专',0, 5);
            for($i=0;$i<$good->good_count();$i++){
                $good->get_good('goods', $i);
          ?>
          <li style="text-align: left;">
            <table><tr><td><img src="<?php $good->get_leftimg();  ?>" /></td><td>
            <h3><a href="good.php?id=<?php echo $good->get_id(); ?>&first=<?php echo $kind; ?>&page_index=good"><?php $good->get_name();   ?></a></h3>
            <?php $good->get_excerpt(45);  ?><br/>
            <span class="author"><a href="#"><?php $good->get_owner();  ?></a></span>&nbsp;&nbsp;
            <span class="date">1990-02-27</span></td></tr></table><div class="clear"></div>
        </li>
          <div class="clear"></div>
          <?php
            }
            ?>
        
        <div class="clear"></div>
      </ul>
    </div>

  <div class="clear"></div>
  <?php require'footer.php';?>
  </div><!--end wrapper-->
</body>
</html>