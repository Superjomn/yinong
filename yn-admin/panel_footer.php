  </div><!--end panel -->
<div id="help_hide_bar" style="display:none;">
  <?php  echo $help_content; 	?>
  </div>
<!--信息-->
<div id="hide_infor_bar" style="display:none;">
	<br />
	<p style="font-size:50px;">易农</p><br /><br />
	<p>易农平台为面向大学校园的开源二手货易购平台。</p>
	<p>聚焦于大学内书籍及其他生活用品的资源循环利用，充分的责任感，让你我携手，一起为自己所不需要用的宝贝们寻觅一个新的主人吧。</p><br />
	<p style="font-size:50px;">忆农</p><br />
	<p>来自中国农大校园的开源低碳环保项目。</p><br />
	<p style="font-size:50px;">亿龙</p><br />
	<p>共同履行我们保卫地球的义务吧！</p><br />
	<p>低碳环保，<b>亿龙</b>&nbsp;&nbsp;同行！</p>
</div>
</body>
<!--对于ie的，关于链接失效的处理-->
<script type="text/javascript" src="jquery/jquery.livequery.js"></script>
<script type="text/javascript">
	$("button.a").livequery('click',function(event){
		//alert('the a is clicked');
		//alert($(this).attr('hr'));
		window.location.href=$(this).attr('hr');
	});
	
</script>
</html>