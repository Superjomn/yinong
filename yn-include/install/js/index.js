//重定向
$(function(){
	$('button').button();	
	$('button.a').click(function(){
		window.location.href=$(this).attr('hr');
	});
});