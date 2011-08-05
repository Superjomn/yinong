<script type="text/javascript">
$(function() {
		$("#tabs").tabs({
			collapsible: true
		});
});

</script>
<div id="tabs">
	<ul>
    	<li><a href="#div-1">易农动态</a></li>
        <li><a href="#div-2">校内公告</a></li>
    </ul>
	<style>
		.tab_div li{
		text-align:left;
		text-indent:30px;
		}
	</style>
    <div id="div-1" class="tab_div" style="text-align:left;">
      <ul>
      <?php
	  	$wp=new Wordpress();
		$termid=$wp->get_term_id('dongtai');
		$wp->get_wps($termid,6);
		for($i=0;$i<$wp->get_count();$i++){	
			$wp->get_wp($i);
	   ?>
       	<li><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>"><?php $wp->get_title(); ?></a></li>
       <?php	
		}
	  ?>    
        
      </ul>
    </div>
    <div id="div-2" class="tab_div">
    	<ul>
      <?php
	  	$wp=new Wordpress();
		$termid=$wp->get_term_id('gonggao');
		$wp->get_wps($termid,6);
		for($i=0;$i<$wp->get_count();$i++){	
			$wp->get_wp($i);
	   ?>
       	<li><a href="yn-content/blog/?p=<?php echo $wp->get_id(); ?>"><?php $wp->get_title(); ?></a></li>
       <?php	
		}
	  ?>    
        
      </ul>
    </div>

</div><!--end tabs-->