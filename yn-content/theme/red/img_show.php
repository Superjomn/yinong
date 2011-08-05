<?php
 require_once 'yn-include/Good.php';
 $good=new Good();
?>

<!--[if IE 8]>
<style>
.image_reel img{
margin-left:-6px;
}
</style><![endif]-->
<!--[if IE 7]>
<style>
.image_reel img{
margin-left:-6px;
}
</style><![endif]-->
<!--[if IE 6]>
<style>
.image_reel img{
margin-left:-6px;
}
</style><![endif]-->

<!--定义一些量-->



<style>
.container{
	float:left;
	margin-top:10px;
	border:none;
}
#s5 img{
	width:295px;
	height:248px;
	border:10px solid #9dc4d9;
}
</style>
<!--开始标签-->
<div class='container' id="s5">
    <?php
        $good->get_goods('on', 0, 6);
        for($i=0;$i<$good->get_count();$i++){
            $good->get_good('goods', $i);

    ?>
    <img src="<?php $good->get_leftimg();?>" />
<?php
        }
?>
</div><!--end container-->

   <script type="text/javascript">
	$('#s5').cycle('fade');

</script> 
