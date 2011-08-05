function out_adv(){
	$("#scroll_adv").slideDown(1000);
}
function in_adv(){
	$("#scroll_adv").slideUp(1000);
}
setTimeout('out_adv()',100);
setTimeout('in_adv()',10000);
$(function(){
    $('#search_button').button();
});



