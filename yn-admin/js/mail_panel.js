//选择的取值
function svalue(id){
   return $(id).getSelectedValue();
}
//开始上传
$(function(){
    //储存为草
    $("#themail").click(function(){
        var send_content=$('#bgcode').val();
        var right_content=send_content.replace(new RegExp("\"","g"),"^");
        //alert('hello');
		//alert(right_content);
		//alert('the level is'+svalue("#the_user_level"));
		$("#thedialog").dialog('open');
        $.post("core/mail_panel.php", {
            subject:$("#subject").val(),
			level:svalue("#the_user_level"),
            content:right_content
        },function(data,textStatus){
			//alert(data);
			$("#thedialog").dialog('close');
			dlg('邮件已经发布！');
		
        });//end post
	});//end click
});
